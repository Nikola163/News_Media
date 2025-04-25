<page-register>
<link rel="stylesheet" href="./public/css/style.css">
	<?php if (($_SESSION['login_status'] ?? '') == 1): ?>
		<a href="<?= URL_INDEX . '?module=home' ?>">Back to homepage</a>
	<?php else: ?>
	<div class='form'><form class="" action="" method="post">
		


        <label for="name">User name: </label>
		
		<input type="text" name="user" id = "user" >
        
        <label for="password">Password: </label>
		<input type="password" name="password" id = "password" >
		<button type="submit" name ="submit">Register</button>
	</form>
	</div>
	<?php endif; ?>
</page-register>