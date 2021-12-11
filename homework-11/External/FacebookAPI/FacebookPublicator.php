<?php

namespace External\FacebookAPI;

class FacebookPublicator
{
	public function publicate(FacebookAdvertisement $facebookAdvertisement): FacebookAdvertisementResult
	{
		//...

		return (new FacebookAdvertisementResult())->setTargetingName("facebook response");
	}
}