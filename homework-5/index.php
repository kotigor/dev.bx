<?php

declare(strict_types=1);
require_once "./lib/template-functions.php";
require_once "./lib/helper-functions.php";
require_once "./data/movies.php";
require_once "./lib/movies-function.php";
require_once "./config/app.php";
/** @var array $movies */
/** @var array $genres */
/** @var array $config */

$currentPage = !isset($_GET['genre']) ? getFileName(__FILE__) : $_GET['genre'];
$currentRequest = '';
$errors = [];

if (isset($_GET['genre']))
{
	$genre = getGenreByCode($genres, $_GET['genre']);
	if ($genre === false)
	{
		$errors[] = 'Жанра с таким кодом нет';
	}
	else
	{
		$movies = filterMoviesByGenre($movies, $genre);
		if (empty($movies))
		{
			$errors[] = 'Фильмов такого жанра пока нет';
		}
	}
}

if (isset($_GET['movie-title']))
{
	$movieTitle = $_GET['movie-title'];
	$currentRequest = $_GET['movie-title'];
	$movies = filterMoviesByTitle($movies, $movieTitle);
	if (empty($movies))
	{
		$errors[] = 'Фильмы с таким названием не найдены';
	}
}

$movieList = renderTemplate("./resources/pages/movie-list.php", [
		'movies' => $movies,
		'errors' => $errors,
]);

renderLayout($movieList, [
	'genres' => $genres,
	'config' => $config,
	'currentPage' => $currentPage,
	'currentRequest' => $currentRequest,
	'style' => 'movie-list-style.css',
]);