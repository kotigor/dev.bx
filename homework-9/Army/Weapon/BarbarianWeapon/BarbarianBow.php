<?php

namespace Army\Weapon\BarbarianWeapon;

use Army\Weapon\Bow;

class BarbarianBow extends Bow{

	public function attack()
	{
		echo 'Attack from barbarian bow';
	}
}