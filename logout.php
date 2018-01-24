<?php
//    session_start();
?>

<html>
<head><title>LogOut</title></head>
<body>

<?php
	print $_SERVER['SERVER_ADDR'];
	print "<br>";

    print('<p>ログインID：');
    print($_COOKIE["login"].' は');

    print('ログアウトしました。</p>');

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