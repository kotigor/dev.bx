<?php

function filterMoviesByGenre(array $movies, string $genre): array
{
	return array_filter($movies, function($movie) use ($genre) {
		return in_array($genre, $movie['genres'], true);
	});
}

function getGenreByCode(string $genre, array $genres): string
{
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

	return $movies[$id - 1];
}

/**
 * @param array $movies
 * @param string $title
 *
 * @return false|array
 */
function filterMoviesByTitle(array $movies, string $title)
{
	return array_filter($movies, function($movie) use ($title) {
		return strpos(mb_strtolower($movie['title']), mb_strtolower($title)) !== false;
	});
}