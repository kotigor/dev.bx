<?php

namespace Decorator\Formatter;

use Service\AdvFormatter;

class DefaultFormatter implements AdvFormatter
{

	function format(string $advText): string
	{
		return $advText;
	}
}