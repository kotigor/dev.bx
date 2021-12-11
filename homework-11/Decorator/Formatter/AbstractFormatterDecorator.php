<?php

namespace Decorator\Formatter;

use Service\AdvFormatter;

abstract class AbstractFormatterDecorator implements AdvFormatter
{
	protected $advFormatter;

	public function __construct(AdvFormatter $advFormatter)
	{
		$this->advFormatter = $advFormatter;
	}

	function format(string $advText): string
	{
		return $this->advFormatter->format($advText);
	}
}