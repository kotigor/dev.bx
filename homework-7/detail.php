<?php

declare(strict_types=1);
require_once "./lib/template-functions.php";
require_once "./lib/helper-functions.php";
require_once "./lib/movies-function.php";
require_once "./config/app.php";
require_once "./lib/db.php";
/** @var array $config */
$movie = [];
$errors = [];
$db = connectToDb($config['dbSettings']);

$genres = getAllGenres($db);

if (isset($_GET['movie-id']))
{
	$movieId = $_GET['movie-id'];
	$movie = getMovieById($db, (int)$movieId);
	if ($movie === false)
	{
		$errors[] = 'Фильм не существует';
	}
}
else
{
	$errors[] = 'Фильм не выбран';
}

$movieCard = renderTemplate('./resources/pages/movie-card.php', [
	'movie' => $movie,
	'errors' => $errors
]);

renderLayout($movieCard, [
	'genres' => $genres,
	'config' => $config,
	'currentPage' => getFileName(__FILE__),
	'style' => 'detail-style.css',
]);