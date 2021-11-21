<?php

function getAllGenres(mysqli $database): array
{
	$query = "SELECT ID, CODE, NAME FROM genre";
	$result = mysqli_query($database, $query);
	$genres = [];
	if (!$result)
	{
		trigger_error(mysqli_error($database), E_USER_ERROR);
	}
	while ($row = mysqli_fetch_assoc($result))
	{
		$genres[$row['ID']] = [
			'CODE' => $row['CODE'],
			'NAME' => $row['NAME'],
		];
	}
	return $genres;
}

function getGenresById(array $genres, string $idsGenres) : array
{
	$idsGenres = explode(',', $idsGenres);
	return array_map(function($id) use($genres) {
		return $genres[$id];
	}, $idsGenres);
}

function getActorsById(mysqli $database, string $idsActors) : array
{
	$actors = [];
	$idsActors = mysqli_real_escape_string($database, $idsActors);
	$query = "SELECT a.ID, a.NAME FROM actor a WHERE a.ID IN ({$idsActors})";
	$result = mysqli_query($database, $query);
	if (!$result)
	{
		trigger_error(mysqli_error($database), E_USER_ERROR);
	}
	while ($row = mysqli_fetch_assoc($result))
	{
		$actors[$row['ID']] = ['NAME' => $row['NAME']];
	}
	return $actors;
}

function getMoviesSearchQuery() : string
{
	return
		"SELECT m.ID,
                m.TITLE,
                m.ORIGINAL_TITLE,
                m.DESCRIPTION,
                m.DURATION,
                m.AGE_RESTRICTION,
                m.RELEASE_DATE,
                m.RATING,
                d.NAME DIRECTOR,
                (SELECT GROUP_CONCAT(mg.GENRE_ID) FROM movie_genre mg WHERE mg.MOVIE_ID = m.ID) GENRES,
                (SELECT GROUP_CONCAT(ma.ACTOR_ID) FROM movie_actor ma WHERE m.ID = ma.MOVIE_ID) ACTORS
				FROM movie m
					INNER JOIN director d on m.DIRECTOR_ID = d.ID";
}

function mapGeneralInfoAboutMovie($movieFromDb) : array
{
	return ['ID' => $movieFromDb['ID'],
			'TITLE' => $movieFromDb['TITLE'],
			'ORIGINAL_TITLE' => $movieFromDb['ORIGINAL_TITLE'],
			'DESCRIPTION' => $movieFromDb['DESCRIPTION'],
			'DURATION' => $movieFromDb['DURATION'],
			'AGE_RESTRICTION' => $movieFromDb['AGE_RESTRICTION'],
			'RELEASE_DATE' => $movieFromDb['RELEASE_DATE'],
			'DIRECTOR' => $movieFromDb['DIRECTOR']];
}

function getMovies(mysqli $database, array $genres, string $genreCode = null, string $title = null) : array
{
	$movies = [];
	$query = getMoviesSearchQuery();
	if ($genreCode !== null)
	{
		$genreCode = mysqli_real_escape_string($database, $genreCode);
		$query = $query .
			"\nINNER JOIN movie_genre g on m.ID = g.MOVIE_ID
			INNER JOIN genre g2 on g.GENRE_ID = g2.ID AND g2.CODE = '{$genreCode}'";
	}
	if ($title !== null)
	{
		$title = mysqli_real_escape_string($database, $title);
		$query = $query . "\nWHERE m.TITLE LIKE '%{$title}%'";
	}
	$result = mysqli_query($database, $query);
	if (!$result)
	{
		trigger_error(mysqli_error($database), E_USER_ERROR);
	}
	while ($row = mysqli_fetch_assoc($result))
	{
		$movie = mapGeneralInfoAboutMovie($row);
		$movie['GENRES'] = getGenresById($genres ,$row['GENRES']);
		$movies[] = $movie;
	}
	return $movies;
}

/**
 * @param mysqli $database
 * @param int $id
 *
 * @return false|array
 */
function getMovieById(mysqli $database, int $id)
{
	$query = getMoviesSearchQuery() . "\nWHERE m.ID = '{$id}'";
	$result = mysqli_query($database, $query);
	if (!$result)
	{
		trigger_error(mysqli_error($database), E_USER_ERROR);
	}
	$row = mysqli_fetch_assoc($result);
	if (!$row)
	{
		return false;
	}
	$movie = mapGeneralInfoAboutMovie($row);
	$movie['RATING'] = $row['RATING'];
	$movie['ACTORS'] = getActorsById($database, $row['ACTORS']);
	return $movie;
}