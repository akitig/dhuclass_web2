<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=decive-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>NewsApp</title>
</head>

<body>
	<header>
		<h1>
			NewsApp
		</h1>
		<?php
		// index.php またはトップページの一部

		// セッションの開始
		session_start();
		?>
		<div class="login-section">
			<?php
			if (isset($_SESSION['username'])) {
				$loggedInUsername = $_SESSION['username'];
				echo "Welcome, $loggedInUsername!";

				// ログイン中の場合、ログアウトボタンを表示
				echo '<a href="logout.php">Logout</a>';
			} else {
				// ログインしていない場合の表示
				echo '<a href="login_form.php">Login</a>';
			}
			?>
		</div>

	</header>
	<main>
		<section class="news-list">
			<?php include('news.php'); ?>
		</section>

		<section id="news">
			<?php
			// セッションからユーザー名を取得
			$loggedInUsername = isset($_SESSION['username']) ? $_SESSION['username'] : '';

			// ログインユーザーが"admin"の場合にのみadd_news_form.phpを表示
			if ($loggedInUsername === 'admin') {
				include('add_news_form.php');
				include('delete_news_form.php');
			}
			?>
		</section>
	</main>

	<footer>
		<p>&copy; akitig news app</p>
	</footer>
</body>

</html>