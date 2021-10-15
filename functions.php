<?php
function printMessage(string $message): void
{
	echo $message . "\n";
}

function isValidAge(string $age) : bool
{
	return is_numeric($age) && ($age >= 0);
}