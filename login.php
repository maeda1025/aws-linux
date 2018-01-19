<?php
    session_start();
?>

<html>
<head><title>Login</title></head>
<body>

<?php

    if (!isset($_SESSION["visited"])){
        print('初回の訪問です。セッションを開始します。');

        $_SESSION["visited"] = 1;
        $_SESSION["date"] = date('c');
    }else{
        $visited = $_SESSION["visited"];
        $visited++;

        print('訪問回数は'.$_SESSION["visited"].'です。<br>');

        $_SESSION["visited"] = $visited;

        if (isset($_SESSION["date"])){
            print('前回の訪問日時は'.$_SESSION["date"].'です。<br>');
        }

        $_SESSION["date"] = date('c');
    }

?>

<p>
<a href="./logout.php">ログアウトする</a>
</p>

</body>
</html>