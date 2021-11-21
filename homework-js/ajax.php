<?php

header('content-type: application/json; charset=UTF-8');

const FILE_NAME = 'data_2.json';

$action = $_GET['action'] ?? null;

$result = [];

$returnResult = function(array $result): void {
	echo json_encode($result);
	return;
};

$saveItems = function() {
	$data = file_get_contents('php://input');

	// todo check header
	try
	{
		$response = json_decode($data, true);
	}
	catch(JsonException $e)
	{
		$response = null;
	}

	if ($response === null)
	{
		return [
			'error' => 'Incorrect json data',
		];
	}

	$items = (array)($response['items'] ?? null);

	file_put_contents(FILE_NAME, json_encode([
		'items' => $items,
	]));

	return [];
};

$loadItems = function() {
	if (!file_exists(FILE_NAME))
	{
		return [
			'items' => [],
		];
	}

	$encodedData = file_get_contents(FILE_NAME);
	try
	{
		$data = json_decode($encodedData, true);
	}
	catch(JsonException $e)
	{
		$data = [];
	}

	return [
		'items' => $data['items'] ?? [],
	];
};

if ($action === 'save')
{
	return $returnResult($saveItems());
}
if ($action === 'load')
{
	return $returnResult($loadItems());
}

return $returnResult(['error' => 'Unknown action']);