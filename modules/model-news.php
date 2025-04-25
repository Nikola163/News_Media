<?php



if ($_app['action'] != '') {
	switch($_app['action']) {
		case 'submit':
			if ($_POST) {
				if (($_POST['cancel'] ?? '') == 1)
					redirect(URL_INDEX . '?module=news');
					$username = $_POST['user'];
					$password = $_POST['password'];
				
					$news_title = $_POST['news_title'];
					$news_short = $_POST['news_short'];
					$news_description = $_POST['news_description'];
					$news_date = date('Y-m-d');
					$news_time = date('H:i:s');
					
					$news_publisher =$_SESSION['username'];
				 
				$sql = "INSERT INTO `news` 
							(`news_publisher`, `news_title`, `news_short`, `news_description`, `news_publish_date`, `news_publish_time`) 
						VALUES
							('{$news_publisher}', '{$news_title}', '{$news_short}', '{$news_description}', '{$news_date}', '{$news_time}')";
				mysqli_query($db, $sql);
				redirect(URL_INDEX . '?module=news');
			}
			$_page_view['breadcrumbs']['./index.php?module=news'] = 'Vesti';
			$_page_view['page_title'] = 'Add news';
			$_page_view['view_filename'] = './template/view-news-submit.php';
			break;
		case 'edit':
			if ($_POST) {
				if (($_POST['cancel'] ?? '') == 1)
					redirect(URL_INDEX . '?module=news');

				$news_title = $_POST['news_title'];
				$news_short = $_POST['news_short'];
				$news_description = $_POST['news_description'];

				$sql = "UPDATE `news` SET
							`news_title` = '{$news_title}',
							`news_short` = '{$news_short}',
							`news_description` = '{$news_description}'
						WHERE
							`news_id` = {$_app['id']}
						LIMIT 1";
				mysqli_query($db, $sql);
				redirect(URL_INDEX . '?module=news');
			}
			$sql = "SELECT *
					FROM `news`
					WHERE `news_id`={$_app['id']}
					LIMIT 1
				";
			$result = mysqli_query($db, $sql);
			$article = mysqli_fetch_assoc($result);
			$_page_view['breadcrumbs']['./index.php?module=news'] = 'News';
			$_page_view['page_title'] = 'Edit News';
			$_page_view['view_filename'] = './template/view-news-submit.php';
			break;
		case 'delete':
			if ($_POST) {
				if ($_POST['confirm_action'] == 1) {
					$sql = "DELETE FROM `news` WHERE `news_id`={$_app['id']} LIMIT 1";
					mysqli_query($db, $sql);
					redirect(URL_INDEX . '?module=news');
				}
				else if ($_POST['confirm_action'] == 0)
					redirect(URL_INDEX . '?module=news');
			}
			
			$sql = "SELECT `news_title` FROM `news` WHERE `news_id`={$_app['id']} LIMIT 1";
			$result = mysqli_query($db, $sql);
			$row = mysqli_fetch_assoc($result);
			$_page_view['admin_confirmation'] = 1;
			$_page_view['breadcrumbs']['./index.php?module=news'] = 'News';
			$_page_view['page_title'] = $row['news_title'];
			$_page_view['view_filename'] = '';
			break;
	}
}
else {
	if ($_app['id'] > 0) {
		$article = [];
		$sql = "SELECT *
				FROM `news`
				WHERE `news_id`={$_app['id']}
				LIMIT 1
			";
		$result = mysqli_query($db, $sql);
		$article = mysqli_fetch_assoc($result);
		
		if (empty($article))
			redirect(URL_INDEX . '?module=error404');

		//$_page_view['page_title'] = $article['news_title'];
		$_page_view['breadcrumbs']['./index.php?module=news'] = 'News';
		$_page_view['view_filename'] = './template/view-news-article.php';
	}
	else {
		$news = [];
		$sql = "SELECT * 
				FROM `news`
				ORDER BY 
					`news_publish_date` DESC,
					`news_publish_time` DESC
				";
		$result = mysqli_query($db, $sql);
		while ($row = mysqli_fetch_assoc($result)) {
			$news[] = $row;
		}

		$_page_view['page_title'] = 'News';
		$_page_view['view_filename'] = './template/view-news-list.php';
	}
}

?>