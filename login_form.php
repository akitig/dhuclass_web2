<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>User Login</title>
</head>

<body>
    <form action="login.php" method="post">
        <?php
        // セッション開始
        session_start();

        // クリックジャッキング対策（X-Frame-Options ヘッダーの設定）
        echo '<header><h1>NewsApp</h1></header>';
        echo '<main><section class="login-form"><h2>User Login</h2>';

        // CSRFトークンの生成
        $csrf_token = bin2hex(random_bytes(32));

        // セッションにCSRFトークンを保存
        $_SESSION['csrf_token'] = $csrf_token;
        echo '<input type="hidden" name="csrf_token" value="' . $csrf_token . '">';

        echo '<label for="username">Username:</label>';
        echo '<input type="text" name="username" required>';

        echo '<label for="password">Password:</label>';
        echo '<input type="password" name="password" required>';

        echo '<button type="submit">Login</button></section></main>';

        echo '<footer><p>&copy; akitig news app</p></footer>';
        ?>
    </form>
</body>

</html>