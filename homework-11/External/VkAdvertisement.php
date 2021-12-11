<?php

namespace External;

class VkAdvertisement
{
	private $title;
	private $messageBody;

	/**
	 * @return string
	 */
	public function getTitle(): string
	{
		return $this->title;
	}

	/**
	 * @param string $title
	 * @return VkAdvertisement
	 */
	public function setTitle(string $title): VkAdvertisement
	{
		$this->title = $title;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getMessageBody(): string
	{
		return $this->messageBody;
	}

	/**
	 * @param string $messageBody
	 * @return VkAdvertisement
	 */
	public function setMessageBody(string $messageBody): VkAdvertisement
	{
		$this->messageBody = $messageBody;
		return $this;
	}


}