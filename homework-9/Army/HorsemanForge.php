<?php

namespace Army;

class HorsemanForge extends Forge
{

	public function createWarrior(): Warrior
	{
		return new Horseman();
	}
}