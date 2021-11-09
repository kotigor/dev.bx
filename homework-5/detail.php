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

$movieId = $_GET['movie-id'];
$movie = getMovieById($movies, (int)$movieId);

$movieCard = renderTemplate('./resources/pages/movie-card.php', ['movie' => $movie]);

renderLayout($movieCard, [
	'genres' => $genres,
	'config' => $config,
	'currentPage' => getFileName(__FILE__),
	'style' => 'detail-style.css',
]);