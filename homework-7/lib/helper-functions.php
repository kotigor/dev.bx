<?php

function getFileName($path): string
{
	return basename($path, ".php");
}

function formatMovieDuration(string $duration): string
{
	return "{$duration} мин. / " . date('H:i', mktime(0, $duration));
}