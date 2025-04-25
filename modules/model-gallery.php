<?php

function gallery_image_filename($id, $thumb = false) {
	$thumb_suffix = $thumb ? '-th' : '';
	return sprintf('gallery-%d%s.jpg', $id, $thumb_suffix);
}

if ($_app['action'] != '') {
	switch($_app['action']) {
		case 'submit':
			if ($_POST) {
				if (($_POST['cancel'] ?? '') == 1)
					redirect(URL_INDEX . '?module=gallery');

				$image = $_FILES['image'];

				if ($image['error'] != 0)
					$_page_view['_error'][] = 'Došlo je do greške. Slika nije učitana';
				else {
					$gallery_title = $_POST['gallery_title'];
					$gallery_description = $_POST['gallery_description'];
					$gallery_date = date('Y-m-d');
					$gallery_time = date('H:i:s');

					$sql = "INSERT INTO `gallery` 
								(`gallery_title`, `gallery_description`, `gallery_publish_date`, `gallery_publish_time`) 
							VALUES
								('{$gallery_title}', '{$gallery_description}', '{$gallery_date}', '{$gallery_time}')";
					mysqli_query($db, $sql);

					$gallery_id = mysqli_insert_id($db);
					$filename = gallery_image_filename($gallery_id);
					move_uploaded_file($image['tmp_name'], DIR_PUBLIC_IMAGES . $filename);
					copy(DIR_PUBLIC_IMAGES . $filename, DIR_PUBLIC_IMAGES . gallery_image_filename($gallery_id, true));

					redirect(URL_INDEX . '?module=gallery');
				}
			}
			$_page_view['breadcrumbs']['./index.php?module=gallery'] = 'Galerija';
			$_page_view['page_title'] = 'add new article';
			$_page_view['view_filename'] = './template/view-gallery-submit.php';
			break;
		case 'edit':
			if ($_POST) {
				if (($_POST['cancel'] ?? '') == 1)
					redirect(URL_INDEX . '?module=gallery');

				$gallery_title = $_POST['gallery_title'];
				$gallery_short = $_POST['gallery_short'];
				$gallery_description = $_POST['gallery_description'];

				$sql = "UPDATE `gallery` SET
							`gallery_title` = '{$gallery_title}',
							`gallery_short` = '{$gallery_short}',
							`gallery_description` = '{$gallery_description}'
						WHERE
							`gallery_id` = {$_app['id']}
						LIMIT 1";
				mysqli_query($db, $sql);
				redirect(URL_INDEX . '?module=gallery');
			}
			$sql = "SELECT *
					FROM `gallery`
					WHERE `gallery_id`={$_app['id']}
					LIMIT 1
				";
			$result = mysqli_query($db, $sql);
			$article = mysqli_fetch_assoc($result);
			$_page_view['breadcrumbs']['./index.php?module=gallery'] = 'Gallery';
			$_page_view['page_title'] = 'Edit Article';
			$_page_view['view_filename'] = './template/view-gallery-submit.php';
			break;
		case 'delete':
			if ($_POST) {
				if ($_POST['confirm_action'] == 1) {
					$sql = "DELETE FROM `gallery` WHERE `gallery_id`={$_app['id']} LIMIT 1";
					mysqli_query($db, $sql);
					redirect(URL_INDEX . '?module=gallery');
				}
				else if ($_POST['confirm_action'] == 0)
					redirect(URL_INDEX . '?module=gallery');
			}
			
			$sql = "SELECT `gallery_title` FROM `gallery` WHERE `gallery_id`={$_app['id']} LIMIT 1";
			$result = mysqli_query($db, $sql);
			$row = mysqli_fetch_assoc($result);
			$_page_view['admin_confirmation'] = 1;
			$_page_view['breadcrumbs']['./index.php?module=gallery'] = 'Gallery';
			$_page_view['page_title'] = $row['gallery_title'];
			$_page_view['view_filename'] = '';
			break;
	}
}
else {
	if ($_app['id'] > 0) {
		$article = [];
		$sql = "SELECT *
				FROM `gallery`
				WHERE `gallery_id`={$_app['id']}
				LIMIT 1
			";
		$result = mysqli_query($db, $sql);
		$article = mysqli_fetch_assoc($result);
		$article['gallery_image_filename'] = gallery_image_filename($article['gallery_id']);
		
		if (empty($article))
			redirect(URL_INDEX . '?module=error404');

		$_page_view['page_title'] = $article['gallery_title'];
		$_page_view['breadcrumbs']['./index.php?module=gallery'] = 'Galerry';
		$_page_view['view_filename'] = './template/view-gallery-article.php';
	}
	else {
		$gallery = [];
		$sql = "SELECT * 
				FROM `gallery`
				ORDER BY 
					`gallery_publish_date` DESC,
					`gallery_publish_time` DESC
				";
		$result = mysqli_query($db, $sql);
		while ($row = mysqli_fetch_assoc($result)) {
			$row['gallery_thumb_filename'] = gallery_image_filename($row['gallery_id'], true);
			$gallery[] = $row;
		}

		$_page_view['page_title'] = 'Galery';
		$_page_view['view_filename'] = './template/view-gallery-list.php';
	}
}

?>