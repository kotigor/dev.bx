<?php

namespace Army\Builder;
use Army\Armor\Armor;
use Army\WarriorTemplate;
use Army\Weapon\Weapon;

interface WarriorBuilder
{
	public function addRightHandWeapon(?Weapon $weapon = null): WarriorBuilder;
	public function addLeftHandWeapon(?Weapon $weapon = null): WarriorBuilder;

	public function addRightHandArmor(?Armor $armor = null): WarriorBuilder;
	public function addLeftHandArmor(?Armor $armor = null): WarriorBuilder;
	public function addHeadArmor(?Armor $armor = null): WarriorBuilder;

	public function createWarriorTemplate(): WarriorBuilder;

	public function getWarrior(): WarriorTemplate;
}