<?php
/** @var array $movie */
?>

<div class="movie-list-item">
	<div class="movie-list-item-hover">
		<a href="detail.php?movie-id=<?= $movie['ID'] ?>" class="movie-list-item-hover-button">Подробнее</a>
	</div>
	<div class="movie-list-item-poster" style="background-image: url(resources/images/<?= $movie['ID'] ?>.jpg); background-size: cover;">
	</div>
	<div class="movie-list-item-info">
		<div class="movie-list-item-info-title"><?= $movie['TITLE'] ?></div>
		<div class="movie-list-item-info-subtitle"><?= $movie['ORIGINAL_TITLE'] ?></div>
	</div>
	<div class="movie-list-item-delimiter">
	</div>
	<div class="movie-list-item-description"><?= $movie['DESCRIPTION'] ?></div>
	<div class="movie-list-item-footer">
		<div class="movie-list-item-footer-time-icon"></div>
		<div class="movie-list-item-footer-time"> <?= formatMovieDuration($movie['DURATION']) ?></div>
		<div class="movie-list-item-footer-genres"><?= implode(array_column($movie['GENRES'], 'NAME'), ', ') ?></div>
	</div>
</div>