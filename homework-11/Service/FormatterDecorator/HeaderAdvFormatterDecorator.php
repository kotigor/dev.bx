<?php

namespace Service\FormatterDecorator;

use Decorator\AbstractFormatterDecorator;

class HeaderAdvFormatterDecorator extends AbstractFormatterDecorator
{
	public function format(string $advText): string
	{
		return '<h1>Внимание!</h1>' . $this->advFormatter->format($advText);
	}
}