<?php

namespace Strategy;

use Entity\Service;
use Event\EventBus;

class PurchaseTrialStrategy implements PurchaseStrategy
{

	public function purchase(): Service
	{
		// ...

		$service = new Service();

		$service->setActivatedAt(new \DateTime());
		$service->setActivatedUntil((new \DateTime())->modify('+ 3 days'));
		$service->setType(Service::TYPES['trial']);
		EventBus::getInstance()->publish('onTrialPurchased', $service);

		return $service;
	}
}