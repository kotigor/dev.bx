<?php

namespace Army\Weapon;

interface AbstractWeaponFactory{
	public function createBow(): Bow;
	public function createKnife(): Knife;
}