<?php

namespace Service\FormatterDecorator;

use Decorator\Formatter\AbstractFormatterDecorator;

class FooterAdvFormatterDecorator extends AbstractFormatterDecorator
{
	function format(string $advText): string
	{
		return $this->advFormatter->format($advText) . '<h4>Ждём вас</h4>';
	}
}