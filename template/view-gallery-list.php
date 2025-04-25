<page-gallery>
	<?php if (is_admin()): ?>
	<admin>
	<a href="<?= URL_INDEX ?>?module=gallery&action=submit">
			<i class="fa fa-plus-circle" aria-hidden="true" title="Ubaci novi članak"></i>
		</a>
	</admin>
	<?php endif; ?>
	<article>
		<?php foreach($gallery AS $article): ?>
			<gallery-item>
				<h2><a href="./index.php?module=gallery&id=<?= $article['gallery_id'] ?>"><?= $article['gallery_title'] ?></a></h2>
				<img src="<?= DIR_PUBLIC_IMAGES ?><?= $article['gallery_thumb_filename'] ?>">
				<?php if (is_admin()): ?>
				<admin>
					<a href="<?= URL_INDEX ?>?module=gallery&action=edit&id=<?= $article['gallery_id'] ?>">
						<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
					</a>  
					<a href="<?= URL_INDEX ?>?module=gallery&action=delete&id=<?= $article['gallery_id'] ?>">
						<i class="fa fa-trash" aria-hidden="true"></i>
					</a>
				</admin>
				<?php endif; ?>
				<date><?= $article['gallery_publish_date'] . ' ' . $article['gallery_publish_time'] ?></date>
			</gallery-item>
		<?php endforeach; ?>
	</article>
</page-gallery>