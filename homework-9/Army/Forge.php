<?php

namespace Army;

abstract class Forge
{
	abstract public function createWarrior(): Warrior;
}