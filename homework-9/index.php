<?php

use Army\Archer;

spl_autoload_register(function ($class)
{
	include __DIR__ . '/' . str_replace("\\", "/", $class) . '.php';
});

$armyType = ['Rome', 'Barbarian'];

$forge = ['Barbarian' => new \Army\Barbarian\BarbarianArmyForge(),
	'Rome' => new \Army\Rome\RomeArmyForge()];
$weaponFactories = ['Barbarian' => new \Army\Weapon\BarbarianWeapon\BarbarianWeaponFactory(),
	'Rome' => new \Army\Weapon\RomeWeapon\RomeWeaponFactory()];

$army = [];

foreach ($armyType as $at)
{
	$army[$at]['Archer'] = $forge[$at]->createArcher($weaponFactories[$at]->createBow());
	$army[$at]['Horseman'] = $forge[$at]->createHorseman($weaponFactories[$at]->createKnife());
}

var_dump($army);