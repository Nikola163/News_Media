<page-login>
	<?php if (($_SESSION['login_status'] ?? '') == 1): ?>
		<a href="<?= URL_INDEX . '?module=home' ?>">Back to homepage</a>
	<?php else: ?>
	<div class='form'><form method="post"> 
		Korisničko ime
		<input type="text" name="user" value="<?= $_POST['user'] ?? '' ?>">
		Lozinka
		<input type="password" name="password">
		<button type="submit" name ="submit">Login</button>
	</form>
	</div>
	<?php endif; ?>
</page-login>