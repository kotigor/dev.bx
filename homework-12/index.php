<?php

use Entity\Service;
use Entity\User;

spl_autoload_register(function ($class) {
	include __DIR__ . '/' . str_replace("\\", "/",  $class) . '.php';
});


\Event\EventBus::getInstance()->subscribe("onTrialPurchased", "\\Helper\\Subscriber::onTrialPurchased");
var_dump(\Strategy\PurchaseServiceContext::purchase(new \Strategy\PurchasePremiumLiteStrategy()));
var_dump(\Strategy\PurchaseServiceContext::purchase(new \Strategy\PurchasePremiumStrategy()));

\Strategy\PurchaseServiceContext::purchase(new \Strategy\PurchaseTrialStrategy());