<?php

declare(strict_types=1);
require_once "./lib/template-functions.php";
require_once "./lib/helper-functions.php";
require_once "./lib/movies-function.php";
require_once "./config/app.php";
require_once "./lib/db.php";
/** @var array $config */

$currentPage = !isset($_GET['genre']) ? getFileName(__FILE__) : $_GET['genre'];
$currentRequest = '';
$errors = [];

$db = connectToDb($config['dbSettings']);
$genres = getAllGenres($db);
$genre = null;

if (isset($_GET['genre']))
{
	$genre = $_GET['genre'];
}

$movies = getMovies($db, $genres, $genre);
if (empty($movies))
{
	$errors[] = 'Фильмы с указанным жанром не найдены';
}

if (isset($_GET['movie-title']))
{
	$movieTitle = $_GET['movie-title'];
	$currentRequest = $_GET['movie-title'];
	$movies = getMovies($db, $genres, $genre, $movieTitle);
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