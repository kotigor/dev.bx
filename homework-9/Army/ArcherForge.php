<?php

namespace Army;

class ArcherForge extends Forge
{

	public function createWarrior(): Warrior
	{
		$archer = new Archer();
		return $archer;
	}
}