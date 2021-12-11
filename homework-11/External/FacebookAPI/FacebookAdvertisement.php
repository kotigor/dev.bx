<?php

namespace External\FacebookAPI;

class FacebookAdvertisement
{
	private $title;
	private $advertisementMessage;
	private $duration;

	/**
	 * @return string
	 */
	public function getTitle(): string
	{
		return $this->title;
	}

	/**
	 * @param string $title
	 * @return self
	 */
	public function setTitle($title): self
	{
		$this->title = $title;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getAdvertisementMessage(): string
	{
		return $this->advertisementMessage;
	}

	/**
	 * @param string $advertisementMessage
	 *
	 * @return self
	 */
	public function setAdvertisementMessage($advertisementMessage): self
	{
		$this->advertisementMessage = $advertisementMessage;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getDuration(): int
	{
		return $this->duration;
	}

	/**
	 * @param int $duration
	 * @return self
	 */
	public function setDuration(int $duration): self
	{
		$this->duration = $duration;
		return $this;
	}
}