<?php
//    session_start();
?>

<html>
<head><title>LogOut</title></head>
<body>

<?php

    print('セッションIDを表示します。<br>');
    print($_COOKIE["login"].'<br>');

    print('<p>ログアウトしました。</p>');

    $_SESSION = array();

    if (isset($_COOKIE["login"])) {
        setcookie("login", '', time() - 1800, '/');
    }

    session_destroy();
?>

<p>
<a href="./login.php">ログイン画面へ戻る</a>
</p>

</body>
</html>