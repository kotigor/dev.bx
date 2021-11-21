<?php
/** @var array $movies */
/** @var array $errors */
?>

<?php if (!empty($errors)): ?>
	<?= renderTemplate('./resources/blocks/_errors.php', ['errors' => $errors]); ?>
<?php else: ?>
<div class="movie-list">
	<?php foreach ($movies as $id => $movie): ?>
		<?= renderTemplate('./resources/blocks/_movie.php', ['movie' => $movie]) ?>
	<?php endforeach; ?>
</div>
<?php endif; ?>