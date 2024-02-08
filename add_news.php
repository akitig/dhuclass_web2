<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // フォームから受け取ったデータ
    $title = $_POST["title"];
    $content = $_POST["content"];

    // JSON ファイルから既存のニュースデータを読み込む
    $newsJson = file_get_contents('news.json');
    $news = json_decode($newsJson, true);

    if ($news === null) {
        // JSON デコードが失敗した場合の処理
        die('Error loading news data from JSON file.');
    }

    // 新しいニュースを追加
    $newNews = array(
        'id' => count($news) + 1,  // 仮のIDを自動生成
        'title' => $title,
        'content' => $content
    );

    // 既存のニュースデータに新しいニュースを追加
    $news[] = $newNews;

    // JSON ファイルに書き込む
    file_put_contents('news.json', json_encode($news, JSON_PRETTY_PRINT));

    // ニュース追加後に遷移するなどの処理
    header("Location: index.php");
    exit();
}
