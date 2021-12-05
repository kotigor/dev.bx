<?php

namespace Army\Weapon\BarbarianWeapon;

use Army\Weapon\AbstractWeaponFactory;
use Army\Weapon\Bow;
use Army\Weapon\Knife;

class BarbarianWeaponFactory implements AbstractWeaponFactory{

	public function createBow(): Bow
	{
		return new BarbarianBow();
	}

	public function createKnife(): Knife
	{
		return new BarbarianKnife();
	}
}