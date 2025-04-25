<page-news>
	



	
	<article>
	<list>
	
		<?php foreach($news AS $article): ?>
			<news-item>
				
			<h2><a href="./index.php?module=news&id=<?= $article['news_id'] ?>"><?= $article['news_title'] ?></a></h2>
			<?php if (is_admin()): ?>
			<admin>
				<a href="<?= URL_INDEX ?>?module=news&action=edit&id=<?= $article['news_id'] ?>">
					<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
				</a>  
				<a href="<?= URL_INDEX ?>?module=news&action=delete&id=<?= $article['news_id'] ?>">
					<i class="fa fa-trash" aria-hidden="true"></i>
				</a>
			</admin>
			<?php endif; ?>
			
			
			<short><?= $article['news_short'] ?></short>

			

			<date><?= $article['news_publish_date'] . ' ' . $article['news_publish_time'] ?></date>
			<short>Author <?= $article['news_publisher'] ?></short>
		
			</news-item>
<?php endforeach; ?>

</list>
	</article>
	
	
</page-news>