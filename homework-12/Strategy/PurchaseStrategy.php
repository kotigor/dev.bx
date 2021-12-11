<?php

namespace Strategy;

use Entity\Service;

interface PurchaseStrategy
{
	public function purchase(): Service;
}