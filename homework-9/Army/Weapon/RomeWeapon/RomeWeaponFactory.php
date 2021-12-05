<?php

namespace Army\Weapon\RomeWeapon;

use Army\Weapon\AbstractWeaponFactory;
use Army\Weapon\Bow;
use Army\Weapon\Knife;

class RomeWeaponFactory implements AbstractWeaponFactory{
	public function createBow(): Bow
	{
		return new RomeBow();
	}
	public function createKnife(): Knife
	{
		return new RomeKnife();
	}
}