<?php
define('ENV_DEV', 0);
define('ENV_PROD', 1);
define('ENV', ENV_PROD);

function db_connect() {
	include('./config.php');
	extract($config);
	$db = mysqli_connect($hostname, $username, $password, $db_name);
	if (!$db) {
		if (ENV == ENV_DEV)
			die("Connection failed: " . mysqli_connect_error());
		else
			die("The application is currently down. Please try again later.");
	}
	return $db;
}

function db_close($db) {
	mysqli_close($db);
}

?>