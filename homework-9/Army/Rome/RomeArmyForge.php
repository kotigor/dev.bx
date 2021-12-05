<?php

namespace Army\Rome;

use Army\AbstractForge;
use Army\Archer;
use Army\Horseman;
use Army\Weapon\Bow;
use Army\Weapon\Knife;
use Army\Weapon\RomeWeapon\RomeBow;

class RomeArmyForge extends AbstractForge
{

	public function createArcher(Bow $bow): Archer
	{
		return new RomeArcher($bow);
	}

	public function createHorseman(Knife $knife): Horseman
	{
		return new RomeHorseman($knife);
	}
}