<?php

namespace Army\Barbarian;

use Army\AbstractForge;
use Army\Archer;
use Army\Horseman;
use Army\Weapon\Bow;
use Army\Weapon\Knife;

class BarbarianArmyForge extends AbstractForge
{

	public function createArcher(Bow $bow): Archer
	{
		return new BarbarianArcher($bow);
	}

	public function createHorseman(Knife $knife): Horseman
	{
		return new BarbarianHorseman($knife);
	}
}