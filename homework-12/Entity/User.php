<?php

namespace Entity;

use DB\DBConnection;
use Event\EventBus;
use Helper\Subscriber;

class User
{
	private $id;
	private $name;
	private $secondName;

	/**
	 * @return mixed
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @param mixed $name
	 * @return User
	 */
	public function setName($name)
	{
		$this->name = $name;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getSecondName()
	{
		return $this->secondName;
	}

	/**
	 * @param mixed $secondName
	 * @return User
	 */
	public function setSecondName($secondName)
	{
		$this->secondName = $secondName;
		return $this;
	}

	public function add()
	{
		DBConnection::add("user", $this);

		EventBus::getInstance()->publish("onUserAdd", $this);
		return $this;
	}

	public function update()
	{
//		DBConnection::update("user", $this);

		EventBus::getInstance()->publish("onUserUpdate", $this);
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param mixed $id
	 * @return User
	 */
	public function setId($id)
	{
		$this->id = $id;
		return $this;
	}

}