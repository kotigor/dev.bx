<?php
/** @var string $content */
/** @var array $config */
/** @var array $genres */
/** @var string $currentPage */
/** @var string $style */
/** @var string $currentRequest */
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Homework-5</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="resources/css/reset.css">
	<link rel="stylesheet" href="resources/css/style.css">
	<link rel="stylesheet" href="resources/css/<?= $style ?>">
</head>
<body>
<div class="wrapper">
	<div class="sidebar">
		<img src="resources/service-icons/logo.svg" alt="bitflix" class="logo">
		<?= renderTemplate('./resources/blocks/_menu.php', ['menu' => $config['menu'], 'genres' => $genres, 'currentPage' => $currentPage]) ?>
	</div>
	<div class="container">
		<div class="header">
			<div class="header-forms">
				<form class="header-forms-find-movie" action="index.php">
					<input class="header-forms-find-movie-input" type="text" name="movie-title" placeholder="Поиск по каталогу..." value="<?= isset($currentRequest) ? $currentRequest : '' ?>">
					<button class="header-forms-find-movie-button">Искать</button>
				</form>
					<a href="add-movie.php" class="header-add-movie-button">Добавить фильм</a>
			</div>
		</div>
		<div class="content">
			<?= $content ?>
		</div>
	</div>
</div>
</body>
</html>