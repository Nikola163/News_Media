<?php

if ($_POST) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];

	if ($name == '')
		$_page_view['_error'][] = 'Username';
	if ($email == '')
		$_page_view['_error'][] = 'Email adress';
	if ($message == '')
		$_page_view['_error'][] = 'Message for administrator';

	if (empty($_page_view['_error'])) {
		$mail_check = mail(
			'nikolatomov@gmail.com', 
			'Poruka sa sajta', 
			$message,
			"From: {$email}\r\n"
		);

		$mail_check = true;
		if ($mail_check === false)
			 $_page_view['_error'][] = 'Slanje poruke administratoru nije uspelo';
		 else
			 $_page_view['_message'][] = 'Your message has been sent. We will contact you within 24 hours';
	}
}

$_page_view['page_title'] = 'Contact';
$_page_view['view_filename'] = DIR_VIEW . 'view-contact.php';
 
?>