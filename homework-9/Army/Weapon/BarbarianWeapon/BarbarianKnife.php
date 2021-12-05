<?php
namespace Army\Weapon\BarbarianWeapon;

use Army\Weapon\Knife;

class BarbarianKnife extends Knife {

	public function attack()
	{
		echo 'Attack from barbarian knife';
	}

	public function blockAttack()
	{
		echo 'Block from barbarian knife';
	}
}