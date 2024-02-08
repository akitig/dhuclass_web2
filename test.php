<?php
// データベースの接続情報
$servername = "localhost:3306";
$username = "akitig";
$password = "";
$dbname = "users";

// データベースに接続
$conn = new mysqli($servername, $username, $password, $dbname);

// 接続エラーの確認
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// フォームから受け取ったユーザー名とパスワード
$username = $_POST["username"];
$password = $_POST["password"];

// ユーザー名とパスワードの検証
if (empty($username) || empty($password)) {
    die("Username and password are required.");
}

// データベースに対してユーザーの存在を確認するクエリ
$check_user_query = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($check_user_query);

if ($result->num_rows > 0) {
    // ユーザーが存在する場合
    $row = $result->fetch_assoc();
    $hashed_password = $row["password"];

    // パスワードの検証
    if (password_verify($password, $hashed_password)) {
        // セッションの開始
        session_start();

        // ユーザー名をセッションに保存
        $_SESSION['username'] = $username;

        // ログイン成功
        echo "Login successful. Redirecting to the homepage...";
        // トップページへのリダイレクト
        header("Location: index.php");
        exit();
    } else {
        // ユーザーが存在しない場合
        die("User not found. Please register.");
    }
}

// データベース接続を閉じる
$conn->close();
