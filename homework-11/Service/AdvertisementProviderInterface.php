<?php

namespace Service;

use Entity\Advertisement;
use Entity\AdvertisementResponse;

interface AdvertisementProviderInterface
{
	public function publicate(Advertisement $advertsement): AdvertisementResponse;
	public function prepare(Advertisement $advertsement);
	public function check(Advertisement $advertsement);
	public function calculateDuration(Advertisement $advertsement);
}