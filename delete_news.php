<?php
session_start();

// セッションからユーザー名を取得
$loggedInUsername = isset($_SESSION['username']) ? $_SESSION['username'] : '';

// ログインユーザーが"admin"でない場合は処理を中断
if ($loggedInUsername !== 'admin') {
    die('Permission denied.');
}

// POST パラメータから削除するニュースの ID を取得
$newsId = isset($_POST['delete_news_id']) ? $_POST['delete_news_id'] : null;

if ($newsId !== null) {
    // JSON データを読み込む
    $jsonData = file_get_contents('news.json');

    // JSON データを配列に変換
    $news = json_decode($jsonData, true);

    // $news から対応するニュースを削除
    foreach ($news as $key => $item) {
        if ($item['id'] == $newsId) {
            unset($news[$key]);
            break;
        }
    }

    // 配列のキーをリセット
    $news = array_values($news);

    // 変更した $news を JSON 形式に変換して保存
    file_put_contents('news.json', json_encode($news, JSON_PRETTY_PRINT));

    // 削除後に index.php にリダイレクト
    header('Location: index.php');
    exit();
} else {
    // 削除するニュース ID が指定されていない場合はエラーメッセージを表示
    die('Invalid request.');
}
