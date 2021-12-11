<?php

namespace External;

class VkAdvertsimentResult
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
	 * @return VkAdvertsimentResult
	 */
	public function setTargetingName(string $targetingName): VkAdvertsimentResult
	{
		$this->targetingName = $targetingName;
		return $this;
	}

}