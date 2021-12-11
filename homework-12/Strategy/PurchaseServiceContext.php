<?php

namespace Strategy;

use Event\EventBus;

class PurchaseServiceContext
{
	public static function purchase(PurchaseStrategy $strategy)
	{
		$service = $strategy->purchase();

		EventBus::getInstance()->publish("onServicePurchase", $service);

		return $service;
	}
}