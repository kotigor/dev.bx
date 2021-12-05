<?php

namespace Army;

use Army\Weapon\Bow;

class Archer implements Warrior
{
	protected $bow;
	function __construct(Bow $bow){
		$this->bow = $bow;
	}
	public function attack(){
		$this->bow->attack();
	}
	public function power(): int
	{
		return 10;
	}
}