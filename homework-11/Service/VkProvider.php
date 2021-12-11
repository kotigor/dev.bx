<?php

namespace Service;

use Adapter\VkAdvertisementProviderAdapter;
use Entity\Advertisement;
use Entity\AdvertisementResponse;

class VkProvider extends AbstractAdvertisementProvider
{

	public function publicate(Advertisement $advertsement): AdvertisementResponse
	{
		$advertsement->setBody($this->formatter->format($advertsement->getBody()));
		echo $advertsement->getBody();
		return (new VkAdvertisementProviderAdapter())->publicate($advertsement);
	}

	public function prepare(Advertisement $advertsement)
	{
		if (!$advertsement->getTitle())
		{
			$advertsement->setTitle("hello");
		}
	}

	public function check(Advertisement $advertsement)
	{
		// TODO: Implement check() method.
	}

	public function calculateDuration(Advertisement $advertsement)
	{
	}
}