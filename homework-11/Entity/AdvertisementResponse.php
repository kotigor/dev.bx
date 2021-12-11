<?php

namespace Entity;

class AdvertisementResponse
{
	private $targeting;

	/**
	 * @return string
	 */
	public function getTargeting(): string
	{
		return $this->targeting;
	}

	/**
	 * @param string $targeting
	 * @return AdvertisementResponse
	 */
	public function setTargeting(string $targeting): AdvertisementResponse
	{
		$this->targeting = $targeting;
		return $this;
	}


}