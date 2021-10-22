<?php
require "functions.php";
require "movies/movies.php";
require "movies/movies-functions.php";
/** @var array $movies */

$title = "Welcome to movie list!";
printMessage($title);

$input = readline("Enter age: ");
if (isValidAge($input))
{
	printMoviesByAge($movies, (int)$input);
}
else
{
	printMessage("Wrong age!");
}