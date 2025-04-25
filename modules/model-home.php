<?php


$news = [];
		$sql = "SELECT *
				FROM `news`
               
				ORDER BY 
					`news_publish_date` DESC,
					`news_publish_time` DESC
                    LIMIT 10
				";
		$result = mysqli_query($db, $sql);
		while ($row = mysqli_fetch_assoc($result)) {
			$news[] = $row;
		}

		$_page_view['page_title'] = 'Actualy News';
		$_page_view['view_filename'] = './template/view-news-list.php';
	

    ?>