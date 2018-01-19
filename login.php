<?php
    session_start();
?>

<html>
<head><title>Login</title></head>
<body>

<?php

    if (!isset($_SESSION["login"])){
        print('初回の訪問です。セッションを開始します。');

    }else{
        print('セッションは開始しています。<br>');
        print('セッションIDは '.$_SESSION["login"].' です。');
    }

?>

<p>
<a href="./logout.php">ログアウトする</a>
</p>

</body>
</html>