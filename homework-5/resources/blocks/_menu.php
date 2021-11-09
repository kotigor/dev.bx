<?php
/** @var array $menu */
/** @var array $genres */
/** @var array $currentPage */
?>


<ul class="sidebar-menu">
	<li class="sidebar-menu-item <?= $currentPage === 'index' ? 'menu-item--active' : '' ?>">
		<a href="index.php"><?= $menu['index'] ?></a>
	</li>
	<? foreach ($genres as $code => $name): ?>
		<li class="sidebar-menu-item <?= $currentPage === $code ? 'menu-item--active' : '' ?>">
			<a href="index.php?genre=<?= $code ?>"><?= $name ?></a>
		</li>
	<? endforeach; ?>
	<li class="sidebar-menu-item <?= $currentPage === 'favorites' ? 'menu-item--active' : '' ?>">
		<a href="favorites.php"><?= $menu['favorites'] ?></a>
	</li>
</ul>

