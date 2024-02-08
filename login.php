<?php
// login.php

// auth.php をインクルード
include 'auth.php';

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

// ログイン処理
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // セッション開始
    session_start();

    // CSRFトークンの検証
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("Invalid CSRF Token");
    }

    // フォームから受け取ったユーザー名とパスワード
    $username = $_POST["username"];
    $password = $_POST["password"];

    // 入力値の検証
    if (empty($username) || empty($password)) {
        die("Username and password are required.");
    }

    // ログイン処理
    authenticateUser($conn, $username, $password);
}

// データベース接続を閉じる
$conn->close();
