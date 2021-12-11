<?php

namespace Adapter;

use Entity\Advertisement;
use Entity\AdvertisementResponse;
use External\FacebookAdvertisement;
use External\FacebookPublicator;
use Service\AdvertisementProviderInterface;

class FacebookAdvertisementProviderAdapter implements AdvertisementProviderInterface
{

	public function publicate(Advertisement $advertsement): AdvertisementResponse
	{
		$facebookAdvertisement = new FacebookAdvertisement();

		if (!$advertsement->getTitle())
		{
			$advertsement->setTitle("default facebook title");
		}
		$facebookAdvertisement
			->setTitle($advertsement->getTitle())
			->setAdvertisementMessage($advertsement->getBody())
			->setDuration($advertsement->getDuration());

		$result = (new FacebookPublicator())->publicate($facebookAdvertisement);

		return (new AdvertisementResponse())->setTargeting($result->getTargetingName());
	}

	public function prepare(Advertisement $advertsement)
	{
		// TODO: Implement prepare() method.
	}

	public function check(Advertisement $advertsement)
	{
		// TODO: Implement check() method.
	}

	public function calculateDuration(Advertisement $advertsement)
	{
		// TODO: Implement calculateDuration() method.
	}
}