<?php
function filterMoviesByAge(array $movies, int $age) : array
{
	$filteredMovies = [];
	foreach ($movies as $movie)
	{
		if($movie["age_restriction"] <= $age)
		{
			$filteredMovies[] = $movie;
		}
	}
	return $filteredMovies;
}

function formatMovies(array $movie, int $index = null)
{
	$indexString = ($index === null) ? "" : "{$index}. ";
	return "{$indexString}{$movie['title']} "
		."({$movie['release_year']}), {$movie['age_restriction']}+. "
		."Rating - {$movie['rating']}";
}

function printMovies(array $movies)
{
	foreach ($movies as $index => $movie)
	{
		printMessage(formatMovies($movie, $index + 1));
	}
}