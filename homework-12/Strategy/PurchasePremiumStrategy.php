<?php

namespace Strategy;

use Entity\Service;

class PurchasePremiumStrategy implements PurchaseStrategy
{

	public function purchase(): Service
	{
		// take money

		$service = new Service();

		$service->setActivatedUntil((new \DateTime())->modify("+ 360 days"));
		$service->setType(Service::TYPES['premium']);
		return $service;
	}
}