<?php

function connectToDb(array $settings) : mysqli
{
	$database = mysqli_init();
	$connectionResult = mysqli_real_connect(
		$database,
		$settings['host'],
		$settings['username'],
		$settings['password'],
		$settings['dbName']
	);
	if (!$connectionResult)
	{
		$error = mysqli_connect_errno() . ": " . mysqli_connect_error();
		trigger_error($error, E_USER_ERROR);
	}
	$setCharsetResult = mysqli_set_charset($database, 'utf8');
	if (!$setCharsetResult)
	{
		trigger_error(mysqli_error($database), E_USER_ERROR);
	}
	return $database;
}