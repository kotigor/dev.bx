<?php

namespace State;

class ActiveState extends AbstractState
{

	public function activate()
	{
		// TODO: Implement activate() method.
	}

	public function pause()
	{
		$this->service->setPausedAd(new \DateTime());
	}

	public function cancel()
	{
		$this->service->setCanceledDate(new \DateTime());
		$this->service->setActivatedUntil(new \DateTime());
	}

	public function changeState()
	{
		return new PausedState($this->service);
	}
}