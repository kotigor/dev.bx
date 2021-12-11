<?php

namespace Adapter;

use Entity\Advertisement;
use Entity\AdvertisementResponse;
use External\VkAdvertisement;
use External\VkPublicator;
use Service\AdvertisementProviderInterface;

class VkAdvertisementProviderAdapter implements AdvertisementProviderInterface
{

	public function publicate(Advertisement $advertsement): AdvertisementResponse
	{
		$vkAdvertisement = new VkAdvertisement();

		if (!$advertsement->getTitle())
		{
			$advertsement->setTitle("default");
		}
		$vkAdvertisement
			->setTitle($advertsement->getTitle())
			->setMessageBody($advertsement->getBody());

		$result = (new VkPublicator())->publicate($vkAdvertisement);

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