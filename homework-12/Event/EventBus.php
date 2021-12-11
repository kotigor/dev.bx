<?php

namespace Event;

class EventBus
{
	private $subscribers;

	private static $instance;

	/**
	 * @param $subscribers
	 */
	private function __construct()
	{
	}

	public static function getInstance(): EventBus
	{
		if (isset(self::$instance))
		{
			return self::$instance;
		}

		self::$instance = new self;

		return self::$instance;
	}

	public function subscribe(string $eventName, callable $callback)
	{
		if (!isset($this->subscribers[$eventName]))
		{
			$this->subscribers[$eventName] = [];
		}

		$this->subscribers[$eventName][] = $callback;
	}

	public function publish(string $eventName, $data)
	{
		if (!isset($this->subscribers[$eventName]))
		{
			return;
		}

		foreach ($this->subscribers[$eventName] as $callback)
		{
			call_user_func($callback, $data);
		}
	}


}