<?php
// データベースの接続情報
$servername = "localhost:3306";
$username = "akitig";
$password = "";
$dbname = "users";

// データベースに接続
$conn = new mysqli($servername, $username, $password, $dbname);

echo "Query executed successfully.";
// 接続エラーの確認
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully.";
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // フォームから受け取ったユーザー名とパスワード
    $username = $_POST["username"];
    $password = $_POST["password"];

    // ユーザー名とパスワードの検証
    if (empty($username) || empty($password)) {
        die("Username and password are required.");
    }

    // パスワードのハッシュ化
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // データベースに新しいユーザーを追加するクエリ
    $insert_query = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";

    if ($conn->query($insert_query) === TRUE) {
        // 登録成功時のメッセージ
        echo "User registered successfully. Redirecting to the homepage...";
        // トップページへのリダイレクト
        header("Location: index.php");
        exit();  // リダイレクト後にコードの実行を終了
        // echo '<meta http-equiv="refresh" content="0;url=index.php">';
        // exit();
    } else {
        // 登録失敗時のエラーメッセージ
        echo "Error: " . $insert_query . "<br>" . $conn->error;
    }
}

// データベース接続を閉じる
// $conn->close();
