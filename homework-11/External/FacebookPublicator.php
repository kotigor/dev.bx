<?php

namespace External;

class FacebookPublicator
{
	public function publicate(FacebookAdvertisement $facebookAdvertisement): FacebookAdvertisementResult
	{
		//...

		return (new FacebookAdvertisementResult())->setTargetingName("facebook response");
	}
}