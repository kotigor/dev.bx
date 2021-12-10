<?php

namespace App\Operation;

class Settings
{
	protected $isBeforeActionsEnabled = true;
	protected $isAfterActionsEnabled = true;

	public function disableBeforeSaveActions(): self
	{
		$this->isBeforeActionsEnabled = false;

		return $this;
	}

	public function isBeforeActionsEnabled(): bool
	{
		return $this->isBeforeActionsEnabled;
	}

	public function disableAfterActions(): self
	{
		$this->isAfterActionsEnabled = false;

		return $this;
	}

	public function isAfterActionsEnabled(): bool
	{
		return $this->isAfterActionsEnabled;
	}
}