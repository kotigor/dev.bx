<?php

namespace Decorator\Cost;

use Service\Calculator;

abstract class AbstractCostDecorator implements Calculator
{
	protected $calculator;
	protected $totalCost;

	/**
	 * @param Calculator $calculator
	 */
	public function __construct(Calculator $calculator)
	{
		$this->calculator = $calculator;
	}


}