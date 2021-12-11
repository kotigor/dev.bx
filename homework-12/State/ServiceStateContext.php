<?php

namespace State;

class ServiceStateContext
{
	/**
	 * @var ServiceState
	 */
	private $state;

	/**
	 * @param ServiceState $state
	 */
	public function __construct(ServiceState $intialState)
	{
		$this->state = $intialState;
	}

	public function changeState()
	{
		$this->state = $this->state->changeState();

		return $this;
	}

	/**
	 * @return ServiceState
	 */
	public function getState(): ServiceState
	{
		return $this->state;
	}
}