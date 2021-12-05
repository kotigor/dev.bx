<?php

namespace Army;

use Army\Weapon\Knife;

class Horseman implements Warrior
{
	protected $knife;
	function __construct(Knife $knife){
		$this->knife = $knife;
	}
	public function attack(){
		$this->knife->attack();
	}
	public function defend(){
		$this->knife->blockAttack();
	}
	public function power(): int
	{
		return 20;
	}
}