<?php
/** @var array $errors*/
?>

<div class="errors">
	<?php foreach ($errors as $error): ?>
		<div class="error"><?= $error ?></div>
	<?php endforeach; ?>
</div>