<page-news>
	<article>
		<form method="post" enctype="multipart/form-data">
			<label>Naslov slike</label>
			<input type="text" name="gallery_title" value="<?= $article['news_title'] ?? '' ?>">
			<label>Opis slike</label>
			<textarea name="gallery_description"><?= $article['news_description'] ?? '' ?></textarea>
			<label>Slika za upload</label>
			<input type="file" name="image">
			<div>
				<button>Pošalji</button>
				<button type="reset">Resetuj</button>
				<button name="cancel" value="1">Otkaži</button>
			</div>
		</form>
	</article>
</page-news>