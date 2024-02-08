<?php

function authenticateUser($conn, $username, $password)
{
    // フォームから受け取ったユーザー名とパスワード
    $username = $_POST["username"];
    $password = $_POST["password"];

    // 入力値の検証
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
}
