<?php

namespace External\VKAPI;

class VkPublicator
{
	public function publicate(VkAdvertisement $advertisement): VkAdvertsimentResult
	{
		//...

		return (new VkAdvertsimentResult())->setTargetingName("response");
	}
}