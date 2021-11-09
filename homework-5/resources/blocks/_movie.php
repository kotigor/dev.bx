<?php
/** @var array $movie */
?>

<div class="movie-list-item">
	<div class="movie-list-item-hover">
		<a href="detail.php?movie-id=<?= $movie['id'] ?>" class="movie-list-item-hover-button">Подробнее</a>
	</div>
	<div class="movie-list-item-poster" style="background-image: url(resources/images/<?= $movie['id'] ?>.jpg); background-size: cover;">
	</div>
	<div class="movie-list-item-info">
		<div class="movie-list-item-info-title"><?= $movie['title'] ?></div>
		<div class="movie-list-item-info-subtitle"><?= $movie['original-title'] ?></div>
	</div>
	<div class="movie-list-item-delimiter">
	</div>
	<div class="movie-list-item-description"><?= $movie['description'] ?></div>
	<div class="movie-list-item-footer">
		<div class="movie-list-item-footer-time-icon"></div>
		<div class="movie-list-item-footer-time"> <?= formatMovieDuration($movie['duration']) ?></div>
		<div class="movie-list-item-footer-genres"><?= implode($movie['genres'], ', ') ?></div>
	</div>
</div>