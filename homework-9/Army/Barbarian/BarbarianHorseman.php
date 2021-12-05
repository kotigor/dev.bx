<?php

namespace Army\Barbarian;

use Army\Horseman;

class BarbarianHorseman extends Horseman
{
	public function power(): int
	{
		return parent::power() + 10;
	}
}