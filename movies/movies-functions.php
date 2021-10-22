<?php

function formatMovie(array $movie, int $index = null) : string
{
	$indexString = ($index === null) ? "" : "{$index}. ";
	return "{$indexString}{$movie['title']} "
		."({$movie['release_year']}), {$movie['age_restriction']}+. "
		."Rating - {$movie['rating']}";
}

function printMoviesByAge(array $movies, int $age)
{
	$index = 0;
	foreach ($movies as $movie)
	{
		if($movie["age_restriction"] <= $age)
		{
			printMessage(formatMovie($movie, $index + 1));
			$index++;
		}
	}
}