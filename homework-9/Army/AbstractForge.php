<?php

namespace Army;

use Army\Weapon\Bow;
use Army\Weapon\Knife;

abstract class AbstractForge
{
	abstract public function createArcher(Bow $bow): Archer;
	abstract public function createHorseman(Knife $knife): Horseman;
}