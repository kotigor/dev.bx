<?php
declare(strict_types=1);
require_once "./lib/template-functions.php";
require_once "./lib/helper-functions.php";
require_once "./config/app.php";
require_once "./lib/db.php";
require_once "./lib/movies-function.php";
/** @var array $config */

$db = connectToDb($config['dbSettings']);
$genres = getAllGenres($db);

$content = renderTemplate('');
renderLayout($content, [
	'genres' => $genres,
	'config' => $config,
	'currentPage' => getFileName(__FILE__)
]);