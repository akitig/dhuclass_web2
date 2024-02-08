<?php

// news data
include 'common.php';

// show all news
foreach ($news as $item) {
    echo '<div class="news-item">';
    // ボタンをクリックしたら詳細ページに遷移する
    echo '<a href="detail.php?id=' . $item['id'] . '">';
    echo '<button>' . $item['title'] . '</button>';
    echo '</a>';
    echo '</div>';
}
