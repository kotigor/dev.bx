<?php

namespace Army\Weapon;

abstract class Knife implements Weapon
{
	abstract public function attack();
	abstract public function blockAttack();
}