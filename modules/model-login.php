<?php

if (($_GET['action'] ?? '') == 'logout') {
	unset($_SESSION['login_status']);
	unset($_SESSION['user_level']);
	
	redirect(URL_INDEX . '?module=home');
}
if (($_SESSION['login_status'] ?? '') == 1) {
	$_page_view['_message'][] = 'Već ste ulogovani';
}
else if ($_POST) {
	$username = $_POST['user'];
	$password = $_POST['password'];
	
	if ($username == '' && $password == '') {
		$_page_view['_message'][] = 'Unesite korisničko ime i lozinku';
	}
	else {
		$sql = "SELECT * FROM `users` WHERE `username`='{$username}'";
		$result = mysqli_query($db, $sql);
		if ($result !== false && $result->num_rows == 1) {
			$row = mysqli_fetch_assoc($result);

			if ($row['password'] == ($password)) {
				$_SESSION['login_status'] = 1;
				$_SESSION['user_level'] = $row['user_level'];
				
				

				redirect(URL_INDEX . '?module=home');
			}
		}
		else
			$_page_view['_error'][] = 'Uneti podaci nisu ispravni';
	}
}

$_page_view['page_title'] = 'Login';  
$_page_view['view_filename'] = './template/view-login.php';
 
?>