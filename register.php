<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>User Registration</title>
</head>

<body>
    <header>
        <h1>NewsApp</h1>
    </header>

    <main>
        <section class="register-form">

            <?php
            // 登録成功時のメッセージを表示
            if (isset($_GET['success']) && $_GET['success'] == 1) {
                echo '<p class="success-message">User registered successfully. Redirecting to the homepage...</p>';
            }
            ?>
            <h2>User Registration</h2>

            <form action="register_process.php" method="post">
                <label for="username">Username:</label>
                <input type="text" name="username" required>

                <label for="password">Password:</label>
                <input type="password" name="password" required>

                <button type="submit">Register</button>
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; akitig news app</p>
    </footer>
</body>

</html>