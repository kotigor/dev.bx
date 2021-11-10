<?php

function filterMoviesByGenre(array $movies, string $genre): array
{
	return array_filter($movies, function($movie) use ($genre) {
		return in_array($genre, $movie['genres'], true);
	});
}

/**
 * @param array $genres
 * @param string $genre
 *
 * @return false|string
 */
function getGenreByCode(array $genres, string $genre)
{
	if (!isset($genres[$genre]))
	{
		return false;
	}
	return $genres[$genre];
}

/**
 * @param array $movies
 * @param int $id
 *
 * @return false|array
 */
function getMovieById(array $movies, int $id)
{
	$key = array_search($id, array_column($movies, 'id'), true);
	if ($key === false)
	{
		return false;
	}

	return $movies[$key];
}


function filterMoviesByTitle(array $movies, string $title) : array
{
	return array_filter($movies, function($movie) use ($title) {
		return strpos(mb_strtolower($movie['title']), mb_strtolower($title)) !== false;
	});
}