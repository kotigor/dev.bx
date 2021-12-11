<?php

namespace State;

use Entity\Service;

abstract class AbstractState implements ServiceState
{
	/**
	 * @var Service
	 */
	protected $service;

	/**
	 * @param $service
	 */
	public function __construct($service)
	{
		$this->service = $service;
	}


}