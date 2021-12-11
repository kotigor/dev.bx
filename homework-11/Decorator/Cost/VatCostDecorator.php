<?php

namespace Decorator\Cost;

use Service\Calculator;

class VatCostDecorator extends AbstractCostDecorator
{

	public function applyCost(): Calculator
	{
		$this->totalCost = $this->calculator->getTotalCost() + ($this->calculator->getTotalCost() * 0.21);
		return $this;
	}

	public function getTotalCost(): float
	{
		return $this->totalCost;
	}
}