<?php

namespace External;

class FacebookAdvertisementResult
{
	public $targetingName;

	/**
	 * @return string
	 */
	public function getTargetingName(): string
	{
		return $this->targetingName;
	}

	/**
	 * @param string $targetingName
	 * @return self
	 */
	public function setTargetingName($targetingName): self
	{
		$this->targetingName = $targetingName;
		return $this;
	}
}