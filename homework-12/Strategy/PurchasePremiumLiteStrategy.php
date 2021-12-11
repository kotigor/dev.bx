<?php

namespace Strategy;

use Entity\Service;

class PurchasePremiumLiteStrategy implements PurchaseStrategy
{

	public function purchase(): Service
	{
		// take money
		$service = new Service();

		$service->setIsLite(true);
		$service->setActivatedUntil((new \DateTime())->modify("+ 180 days"));
		$service->setType(Service::TYPES['premium_lite']);
		return $service;
	}
}