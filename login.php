<?php
    session_name("login");
    session_start();
?>

<html>
<head><title>Login</title></head>
<body>

<?php
 	print $_SERVER['SERVER_ADDR'];
	print "<br>";

    if (!isset($_COOKIE["login"])){
        print('ログインしてください。');

    }else{
        print('ログインしています。<br>');
        print('ログインIDは '.$_COOKIE["login"].' です。');
    }

?>

<p>
<a href="./login.php">ログインする</a>
<a href="./logout.php">ログアウトする</a>
</p>

</body>
</html>