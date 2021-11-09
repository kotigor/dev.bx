<?php
/** @var array $movie */
?>

<div class="movie-card">
	<div class="movie-card-header">
		<div class="movie-card-header-name">
			<div class="movie-card-header-title"><?= "{$movie['title']} ({$movie['release-date']})" ?></div>
			<div class="movie-card-header-subtitle-and-age-limit">
				<div class="movie-card-header-subtitle"><?= $movie['original-title'] ?></div>
				<div class="movie-card-header-age-limit"><?= "{$movie['age-restriction']}+" ?></div>
			</div>
		</div>
		<div class="movie-card-header-favorite-button"></div>
	</div>
	<div class="movie-card-delimiter"></div>
	<div class="movie-card-detail">
		<div class="movie-card-detail-poster" style="background-image: url(resources/images/<?=$movie['id']?>.jpg);"></div>
		<div class="movie-card-detail-info">
			<div class="movie-rating">
				<?php for($i = 1; $i <= 10; $i++): ?>
					<div class="movie-rating-square--<?= $i <= $movie['rating'] ? 'enable' : 'disable' ?>"></div>
				<?php endfor; ?>
				<div class="movie-rating-number"><?= number_format($movie['rating'], 1) ?></div>
			</div>
			<div class="movie-card-detail-info-about">
				<div class="movie-about-title">О фильме</div>
				<div class="movie-about-item">
					<div class="movie-about-item-title">Год производства:</div>
					<div class="movie-about-item-text"><?= $movie['release-date'] ?></div>
				</div>
				<div class="movie-about-item">
					<div class="movie-about-item-title">Режисер:</div>
					<div class="movie-about-item-text"><?= $movie['director'] ?></div>
				</div>
				<div class="movie-about-item">
					<div class="movie-about-item-title">В главных ролях:</div>
					<div class="movie-about-item-text"><?= implode($movie['cast'], ', ') ?></div>
				</div>
			</div>
			<div class="movie-card-detail-info-description">
				<div class="movie-description-title">Описание</div>
				<div class="move-description"><?= $movie['description'] ?></div>
			</div>
		</div>
	</div>
</div>