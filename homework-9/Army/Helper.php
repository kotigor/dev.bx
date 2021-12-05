<?php

namespace Army;

class Helper
{
	public static function getForge(string $type)
	{
		switch($type)
		{
			case 'archer':
				return new ArcherForge();
			case 'horseman':
				return new HorsemanForge();
		}
	}
}