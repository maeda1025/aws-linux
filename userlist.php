<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="https://www.jtpedu-lab.com/css/common.css" media="all">
		<title>EC2 Instance / PHP</title>
		<?php
		require_once 'db_functions.php';
		?>
        </head>

        <body>
                <p>User List</p>

                <?php
			print $_SERVER['SERVER_ADDR'];

			$DB_HOST = $_SERVER['DBHOST'];
			$DB_USER = $_SERVER['DBUSER'];
			$DB_PASS = $_SERVER['DBPASS'];
			$DB_NAME = $_SERVER['DBNAME'];

			connect_db($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME);

			<b>Å°Instructor í«â¡:</b>
			<br>
			<form action="insert_data.php" method="post" value=""/>
				<b>ñºëO:</b>
				<input type="text" name="userid" value="" size="25">
				<b>Team:</b>
				<input type="text" name="username" value="" size="10">
				<input type="submit" value="ëóêM" />
			</form>

			show_db_table('users');
                ?>

                <a href="https://www.jtpedu-lab.com">To:index(S3)</a><br>
                <a href="https://webapp.jtpedu-lab.com">To:Application-Server(EC2)</a><br>
                <a href="https://webapp.jtpedu-lab.com/userlist.php">To:User-List(PHP)</a><br>
        </body>
</html>
