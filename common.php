<?php
// 共通のニュースデータをJSONファイルから読み込む
$newsJson = file_get_contents('news.json');
$news = json_decode($newsJson, true);

if ($news === null) {
    // JSON デコードが失敗した場合の処理
    die('Error loading news data from JSON file.');
}
