<?php
/** @var array $movies */
/** @var array $errors */
?>

<div class="movie-list">
	<?php if (empty($errors)): ?>
		<?php foreach ($movies as $movie): ?>
			<?= renderTemplate('./resources/blocks/_movie.php', ['movie' => $movie]) ?>
		<?php endforeach; ?>
	<?php else: ?>
		<div class="errors">
			<?php foreach ($errors as $error): ?>
				<div class="error"><?= $error ?></div>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
</div>