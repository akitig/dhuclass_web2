
<?php
// セッションの開始
session_start();

// セッションを破棄してログアウト
session_destroy();

// ログアウト後、トップページにリダイレクト
header("Location: index.php");
exit();
?>
