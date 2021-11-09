<?php
declare(strict_types=1);
require_once "./lib/template-functions.php";
require_once "./lib/helper-functions.php";
require_once "./data/movies.php";
require_once "./config/app.php";
/** @var array $genres */
/** @var array $config */


$content = renderTemplate('');
renderLayout($content, [
	'genres' => $genres,
	'config' => $config,
	'currentPage' => getFileName(__FILE__)
]);