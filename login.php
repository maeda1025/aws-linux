<?php
    session_name("login");
    session_start();
?>

<html>
<head><title>Login</title></head>
<body>

<?php
 	print $_SERVER['SERVER_ADDR'];
	print <br>;

    if (!isset($_COOKIE["login"])){
        print('初回の訪問です。セッションを開始します。');

    }else{
        print('セッションは開始しています。<br>');
        print('セッションIDは '.$_COOKIE["login"].' です。');
    }

?>

<p>
<a href="./logout.php">ログアウトする</a>
</p>

</body>
</html>