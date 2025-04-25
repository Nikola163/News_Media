<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="./public/css/style.css">
</head>
<body>
	<above-header>
		<div>
		<header class='header'>media portal</header>
		</div>

		<div class='navigation'>
		
			<?php if (is_admin()): ?>
				<button>
					<admin class = "dodajO">
						<a class="dodaj" href="<?= URL_INDEX ?>?module=news&action=submit">
						<i class="dodaj" aria-hidden="true" title="Add news article">Add news</i>
						</a>
					</admin>

			<?php endif; ?>
			</button>
			
			<?php if (is_anonymous()): ?>
				<button>
					<admin class = "dodajO">
						<a class="dodaj" href="<?= URL_INDEX ?>?module=news&action=submit">
						<i class="dodaj" aria-hidden="true" title="Add news article">Add news</i>
						</a>
					</admin>

			<?php endif; ?>
			</button>
			<button>
			<a class= "log"  href="<?= URL_INDEX ?>?module=register&action=register">Register
				</a>
				</button>
				<button>
				<?php if ($_SESSION['login_status'] ?? '' == true): ?>
				<a class= "log"  href="<?= URL_INDEX ?>?module=login&action=logout">Logout
				</a>
				</button>
				
			<?php else: ?>
				<a class= "log" href="<?= URL_INDEX ?>?module=login&action=login">Login
					
				</a>
			
			<?php endif; ?>
			
		</div>


	
	
	</above-header>

	<div>
	
	<nav class = 'page'>

	<a href="<?= URL_INDEX ?>?module=home">Actualy</a>
	<a href="<?= URL_INDEX ?>?module=news">News</a>
	<a href="<?= URL_INDEX ?>?module=gallery">Galerija</a>
	<a href="<?= URL_INDEX ?>?module=contact">Contact</a>
		
	</nav>
	</div>

	<wrapper>
