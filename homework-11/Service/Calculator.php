<?php

namespace Service;

interface Calculator
{
	public function applyCost(): Calculator;
	public function getTotalCost(): float;
}