
	<?php if (!empty($_page_view['breadcrumbs'])): ?>
		<breadcrumbs>
		<?php foreach($_page_view['breadcrumbs'] AS $url => $label): ?>
			<a href="<?= $url ?>"><?= $label ?></a>
		<?php endforeach; ?>
		</breadcrumbs>
	<?php endif; ?>

	<h1 class='pagetitle'><?= $_page_view['page_title'] ?></h1>

	<error>
	<?php if (!empty($_page_view['_error'])): ?>
	<ul>
	<?php foreach($_page_view['_error'] AS $k => $v): ?>
		<li><?= $v ?></li>
	<?php endforeach; ?>
	</ul>
	<?php endif; ?>
	</error>
	<message>
	<?php if (!empty($_page_view['_message'])): ?>
	<ul>
	<?php foreach($_page_view['_message'] AS $k => $v): ?>
		<li><?= $v ?></li>
	<?php endforeach; ?>
	</ul>
	<?php endif; ?>
	</message>
	<?php if (($_page_view['admin_confirmation'] ?? '') == 1): ?>



		<div class='form'>
		<form method="post">
			<div>
			<div>Are you sure you want to delete this article?</div>
			<button name="confirm_action" value="1">Delete</button>
			<button name="confirm_action" value="0">Cancel</button>
		</div>
		</form>
		</div>
	<?php endif; ?>
