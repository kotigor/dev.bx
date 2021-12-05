<?php

namespace Army\Barbarian;

use Army\Archer;

class BarbarianArcher extends Archer
{
	public function power(): int
	{
		return parent::power() + 40;
	}
}