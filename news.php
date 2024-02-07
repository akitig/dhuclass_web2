<?php

// news data
$news = array(
	array('title' => 'news1', 'content' => 'news1 main text'),
	array('title' => 'news2', 'content' => 'news2 main text'),
	array('title' => 'news3', 'content' => 'news3 main text'),
);

// show all news
foreach ($news as $item){
	echo '<div class="news-item">';
	echo '<h2>' . $item['title'] . '</h2>';
	echo '<p>' . $item['content'] . '</p>';
	echo '</div>';
}
?>
