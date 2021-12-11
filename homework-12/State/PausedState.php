<?php

namespace State;

class PausedState extends AbstractState
{
	public function activate()
	{
		$this->service->setPausedAd(null);
		$this->service->setActivatedAt(new \DateTime());
		$this->service->setActivatedUntil((new \DateTime())->modify("+ 10 days"));
	}

	public function pause()
	{
	}

	public function cancel()
	{
		$this->service->setCanceledDate(new \DateTime());
		$this->service->setPausedAd(null);
		$this->service->setActivatedUntil(new \DateTime());
	}

	public function changeState()
	{
		return new CanceledState($this->service);
	}
}