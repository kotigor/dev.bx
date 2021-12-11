<?php

namespace State;

class CanceledState extends AbstractState
{

	public function activate()
	{
	}

	public function pause()
	{
	}

	public function cancel()
	{
	}

	public function changeState()
	{
		return $this;
	}
}