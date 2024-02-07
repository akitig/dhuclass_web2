<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>News Detail</title>
</head>

<body>
    <header>
        <h1>News Detail</h1>
    </header>

    <main>
        <?php
        include 'common.php';

        $newsId = isset($_GET['id']) ? $_GET['id'] : null;

        if ($newsId !== null) {
            $selectedNews = array_filter($news, function ($item) use ($newsId) {
                return $item['id'] == $newsId;
            });

            if (!empty($selectedNews)) {
                $selectedNews = reset($selectedNews);
                echo '<h2>' . $selectedNews['title'] . '</h2>';
                echo '<p>' . $selectedNews['content'] . '</p>';
            } else {
                echo '<p>News not found</p>';
            }
        } else {
            echo '<p>Invalid request</p>';
        }
        ?>
    </main>

    <footer>
        <p>&copy; akitig news app</p>
    </footer>
</body>

</html>