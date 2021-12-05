<?php

namespace Army\Rome;

use Army\Horseman;

class RomeHorseman extends Horseman
{
	public function power(): int
	{
		return parent::power() + 20;
	}
}