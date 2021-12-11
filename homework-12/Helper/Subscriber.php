<?php

namespace Helper;

class Subscriber
{
	public static function onUserAdd($data)
	{
		echo $data->getId() . PHP_EOL;
	}
	public static function onUserUpdate($data)
	{
		echo $data->getName() . PHP_EOL;
	}
	public static function onTrialPurchased($data)
	{
		echo 'Trial version was purchased on ' . $data->getActivatedAt()->format('d-m-Y H:i:s') . PHP_EOL
			. 'Valid until ' . $data->getActivatedUntil()->format('d-m-Y H:i:s') . PHP_EOL;
	}
}