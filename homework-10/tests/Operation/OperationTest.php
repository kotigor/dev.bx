<?php

use PHPUnit\Framework\TestCase;

class OperationTest extends TestCase
{
	public function getDifferentSettings() : array
	{
		$settings = new App\Operation\Settings();

		return [
			'disableBeforeSaveActions' =>[
				'settings' => $settings->disableBeforeSaveActions(),
				'action' => \App\Operation\Operation::ACTION_BEFORE_SAVE,
			],
			'disableAfterSaveActions' => [
				'settings' => $settings->disableAfterActions(),
				'action' => \App\Operation\Operation::ACTION_AFTER_SAVE,
			]
		];
	}

	protected function getOrderThatSavesSuccessfully()
	{
		$order = $this->getMockBuilder(\App\Order::class)
			->onlyMethods(['save'])
			->getMock()
		;

		$order->expects(static::once())
			->method('save')
			->willReturn(new \App\Result())
		;

		return $order;
	}

	protected function getActionThatNeverInvoked()
	{
		$action = $this->getMockBuilder(\App\Operation\Action::class)
			->onlyMethods(['process'])
			->getMockForAbstractClass()
		;
		$action->expects(static::never())
			->method('process')
		;

		return $action;
	}

	protected function getActionThatOnceInvoked()
	{
		$action = $this->getMockBuilder(\App\Operation\Action::class)
					   ->getMockForAbstractClass()
		;
		$action->method('process')
			   ->willReturn(new \App\Result());
		$action->expects(static::once())
			   ->method('process')
		;

		return $action;
	}

	public function testThatLaunchSuccessIfOrderSaveSuccess(): void
	{
		$order = $this->getOrderThatSavesSuccessfully();

		$operation = new App\Operation\Operation($order);

		$result = $operation->launch();

		static::assertTrue($result->isSuccess());
	}

	public function testThatLaunchFailIfOrderSaveFail(): void
	{
		$order = $this->getMockBuilder(\App\Order::class)
			->onlyMethods(['save'])
			->getMock()
		;

		$errorCode = random_int(0, 999);

		$result = new \App\Result();
		$result->addError(new Error('Test message', $errorCode));

		$order->expects(static::once())
			->method('save')
			->willReturn($result)
		;

		$operation = new App\Operation\Operation($order);

		$result = $operation->launch();

		static::assertFalse($result->isSuccess());

		$errorWithCode = null;
		foreach ($result->getErrors() as $error)
		{
			if ($error->getCode() === $errorCode)
			{
				$errorWithCode = $error;
			}
		}

		static::assertNotNull($errorWithCode);
	}

	public function testThatOrderSaveIsNotInvokedIfBeforeActionFail(): void
	{
		$order = $this->getMockBuilder(\App\Order::class)
			->onlyMethods(['save'])
			->getMock()
		;

		$order->expects(static::never())
			->method('save')
		;

		$operation = new App\Operation\Operation($order);

		$action = $this->getMockBuilder(\App\Operation\Action::class)
			->onlyMethods(['process'])
			->getMockForAbstractClass()
		;
		$errorMessage = 'Error during before action in test';
		$action->expects(static::once())
			->method('process')
			->with($order)
			->willReturn((new \App\Result())->addError(new Error($errorMessage)))
		;

		$operation->addAction(
			\App\Operation\Operation::ACTION_BEFORE_SAVE,
			$action
		);

//		$action = new class extends \App\Operation\Action {
//			public function process(\App\Order $order): \App\Result
//			{
//				return (new \App\Result())->addError(new Error('Test error'));
//			}
//		};

		$afterAction = $this->getActionThatNeverInvoked();

		$operation->addAction(
			\App\Operation\Operation::ACTION_AFTER_SAVE,
			$afterAction
		);

		$result = $operation->launch();

		static::assertFalse($result->isSuccess());
		static::assertEquals($errorMessage, $result->getErrorMessages()[0]);
	}

	public function testThatOperationConfigurationIsPossible(): void
	{
		$settings = new App\Operation\Settings();

		$order = $this->getOrderThatSavesSuccessfully();

		$operation = new App\Operation\Operation($order, $settings);

		$result = $operation->launch();

		static::assertNotNull($result);
	}

	public function testThatOperationHasSettingsObject(): void
	{
		$settings = new App\Operation\Settings();

		$order = $this->getMockBuilder(\App\Order::class)
			->onlyMethods(['save'])
			->getMock()
		;

		$operation = new App\Operation\Operation($order, $settings);

		static::assertObjectHasAttribute('settings', $operation);
	}

	/**
	 * @dataProvider getDifferentSettings
	 *
	 * @param \App\Operation\Settings $settings
	 * @param string $action
	 */
	public function testThatOperationDoesNotInvokeIfTheyDisabledInSettings(\App\Operation\Settings $settings, string $action): void
	{
		$order = $this->getOrderThatSavesSuccessfully();

		$operation = new App\Operation\Operation($order, $settings);
		$operation->addAction(
			$action,
			$this->getActionThatNeverInvoked()
		);

		$operation->launch();
	}

	public function testThatOperationInvokeIfTheyEnabledInSettings()
	{
		$settings = new App\Operation\Settings();

		$order = $this->getOrderThatSavesSuccessfully();

		$operation = new App\Operation\Operation($order, $settings);

		$operation->addAction(
			\App\Operation\Operation::ACTION_AFTER_SAVE,
			$this->getActionThatOnceInvoked()
		);

		$operation->addAction(
			\App\Operation\Operation::ACTION_BEFORE_SAVE,
			$this->getActionThatOnceInvoked()
		);

		$operation->launch();
	}
}
