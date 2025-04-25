<page-news>
	<article>
		
		<article-title>
	<?= $article['news_title'] ?>

	</article-title>
		<article-full>
		

		<?= $article['news_description'] ?>


		</article-full>
		<date>
			<?= $article['news_publish_date'] ?> <?= $article['news_publish_time'] ?>
		</date>
		<article-publisher>
		Author  <?= $article['news_publisher']?>
		</article-publisher>

		
	</article>
</page-news>