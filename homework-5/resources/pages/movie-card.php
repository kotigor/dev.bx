<?php
/** @var array $movie */
/** @var array $errors */
?>

<?php if (!empty($errors)): ?>
	<?= renderTemplate('./resources/blocks/_errors.php', ['errors' => $errors]); ?>
<?php else: ?>
	<?= renderTemplate('./resources/blocks/_movie-card.php', ['movie'=>$movie]); ?>
<?php endif; ?>