<?php

namespace Service\Formatting;

interface Formatter
{
	public function format(string $text): string;
}