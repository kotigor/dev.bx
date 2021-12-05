<?php
namespace Army\Weapon\RomeWeapon;

use Army\Weapon\Knife;

class RomeKnife extends Knife {

	public function attack()
	{
		echo 'Attack from rome knife';
	}

	public function blockAttack()
	{
		echo 'Block from rome knife';
	}
}