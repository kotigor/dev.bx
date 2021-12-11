<?php

namespace Service\FormatterDecorator;

use Decorator\AbstractFormatterDecorator;

class FooterAdvFormatterDecorator extends AbstractFormatterDecorator
{
	function format(string $advText): string
	{
		return $this->advFormatter->format($advText) . '<h4>Ждём вас</h4>';
	}
}