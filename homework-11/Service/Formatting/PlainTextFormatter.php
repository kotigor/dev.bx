<?php

namespace Service\Formatting;

class PlainTextFormatter implements Formatter
{

	public function format(string $text): string
	{
		return $text;
	}
}