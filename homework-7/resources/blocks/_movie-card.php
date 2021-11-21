<?php
/** @var array $movie */
?>

<div class="movie-card">
	<div class="movie-card-header">
		<div class="movie-card-header-name">
			<div class="movie-card-header-title"><?= "{$movie['TITLE']} ({$movie['RELEASE_DATE']})" ?></div>
			<div class="movie-card-header-subtitle-and-age-limit">
				<div class="movie-card-header-subtitle"><?= $movie['ORIGINAL_TITLE'] ?></div>
				<div class="movie-card-header-age-limit"><?= "{$movie['AGE_RESTRICTION']}+" ?></div>
			</div>
		</div>
		<div class="movie-card-header-favorite-button"></div>
	</div>
	<div class="movie-card-delimiter"></div>
	<div class="movie-card-detail">
		<div class="movie-card-detail-poster" style="background-image: url(resources/images/<?=$movie['ID']?>.jpg);"></div>
		<div class="movie-card-detail-info">
			<div class="movie-rating">
				<?php for($i = 1; $i <= 10; $i++): ?>
					<div class="movie-rating-square--<?= $i <= (double)$movie['RATING'] ? 'enable' : 'disable' ?>"></div>
				<?php endfor; ?>
				<div class="movie-rating-number"><?= number_format((double)$movie['RATING'], 1) ?></div>
			</div>
			<div class="movie-card-detail-info-about">
				<div class="movie-about-title">О фильме</div>
				<div class="movie-about-item">
					<div class="movie-about-item-title">Год производства:</div>
					<div class="movie-about-item-text"><?= $movie['RELEASE_DATE'] ?></div>
				</div>
				<div class="movie-about-item">
					<div class="movie-about-item-title">Режисер:</div>
					<div class="movie-about-item-text"><?= $movie['DIRECTOR'] ?></div>
				</div>
				<div class="movie-about-item">
					<div class="movie-about-item-title">В главных ролях:</div>
					<div class="movie-about-item-text"><?= implode(array_column($movie['ACTORS'], 'NAME'), ', ') ?></div>
				</div>
			</div>
			<div class="movie-card-detail-info-description">
				<div class="movie-description-title">Описание</div>
				<div class="move-description"><?= $movie['DESCRIPTION'] ?></div>
			</div>
		</div>
	</div>
</div>
