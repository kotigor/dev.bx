<?php

class FinancialTransactionsRuTest extends \PHPUnit\Framework\TestCase
{
	public function getValidateFailSamples(): array
	{
		return [
			'empty' => [
				[],
				array_fill(0, 5, \App\DataGenerator\FinancialTransactionsRu::ERROR_CODE_MANDATORY_FIELD_IS_NOT_FILLED)
			],
			'filled_but_empty' => [
				[
					'Name' => '',
					'PersonalAcc' => '',
					'BankName' => '',
					'BIC' => '',
					'CorrespAcc' => '',
				],
				array_fill(0, 5, \App\DataGenerator\FinancialTransactionsRu::ERROR_CODE_MANDATORY_FIELD_IS_NOT_FILLED)
			],
			'incorrect_type' => [
				[
					'Name' => true,
					'PersonalAcc' => true,
					'BankName' => true,
					'BIC' => true,
					'CorrespAcc' => true,
				],
				array_fill(0, 5, \App\DataGenerator\FinancialTransactionsRu::ERROR_CODE_VALUE_INCORRECT_TYPE)
			],
			'too_long' => [
				[
					'Name' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eget lorem vestibulum, porttitor nisi eget, pellentesque velit. Nunc vehicula et lacus nec libero.',
					'PersonalAcc' => '123456789112345678911',
					'BankName' => 'Lorem ipsum dolor sit amet, consectetur velit.',
					'BIC' => '1234567891',
					'CorrespAcc' => '123456789112345678911',
				],
				array_fill(0, 5, \App\DataGenerator\FinancialTransactionsRu::ERROR_CODE_VALUE_IS_TOO_LONG)
			]
		];
	}

	public function getDataSamples(): array
	{
		return [
			'empty' => [
				[],
				'ST00012|Name=|PersonalAcc=|BankName=|BIC=|CorrespAcc=',
			],
			'filled' => [
				[
					'Name' => 'ТСЖ Маршал',
					'PersonalAcc' => '40702810138250123017',
					'BankName' => 'ОАО "БАНК"',
					'BIC' => '044525225',
					'CorrespAcc' => '30101810400000000225',
					'Sum' => '100000',
					'UIN' => '78123456789120004090125050'
				],
				'ST00012|Name=ТСЖ Маршал|PersonalAcc=40702810138250123017|BankName=ОАО "БАНК"|BIC=044525225|CorrespAcc=30101810400000000225|Sum=100000|UIN=78123456789120004090125050'
			]
		];
	}

	/**
	 * @dataProvider getValidateFailSamples
	 *
	 * @param array $fields
	 * @param array $expectedErrorCodes
	 */
	public function testValidateFail(array $fields, array $expectedErrorCodes): void
	{
		$dataGenerator = new \App\DataGenerator\FinancialTransactionsRu();

		$dataGenerator->setFields($fields);

		$result = $dataGenerator->validate();
		$errorCodes = array_map(function($error) {
			return $error->getCode();
		}, $result->getErrors());
		static::assertFalse($result->isSuccess());
		static::assertEqualsCanonicalizing($errorCodes, $expectedErrorCodes);
	}

	/**
	 * @dataProvider getDataSamples
	 *
	 * @param array $fields
	 * @param array $expectedData
	 */
	public function testGetData(array $fields, string $expectedData): void
	{
		$dataGenerator = new \App\DataGenerator\FinancialTransactionsRu();

		$dataGenerator->setFields($fields);

		$data = $dataGenerator->getData();

		static::assertEquals($expectedData, $data);
	}

	public function testThatValidateSuccess(): void
	{
		$dataGenerator = new \App\DataGenerator\FinancialTransactionsRu();

		$dataGenerator->setFields(['Name' => 'ТСЖ Маршал',
								   'PersonalAcc' => '40702810138250123017',
								   'BankName' => 'ОАО "БАНК"',
								   'BIC' => '044525225',
								   'CorrespAcc' => '30101810400000000225',
								   'Sum' => '100000',
								   'UIN' => '78123456789120004090125050']);

		$result = $dataGenerator->validate();

		static::assertTrue($result->isSuccess());
	}
}
