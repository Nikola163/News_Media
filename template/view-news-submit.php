<page-news>
	<article>
		<div class="form">
		<form method="post">
			<label>Title</label>
			<input type="text" name="news_title" value="<?= $article['news_title'] ?? '' ?>">
			<label>Short news</label>
			<textarea name="news_short"><?= $article['news_short'] ?? '' ?></textarea>
			<label>Full news</label>
			<textarea name="news_description"><?= $article['news_description'] ?? '' ?></textarea>

			
			
			
			<div>
				<button>Send</button>
				<button type="reset">Reset</button>
				<button name="cancel" value="1">Cancel</button>
			</div>
		</form>
		</div>
	</article>
</page-news>