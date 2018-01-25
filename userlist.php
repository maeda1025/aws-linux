<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="https://www.jtpedu-lab.com/css/common.css" media="all">
	<title>EC2 Instance / PHP</title>

	<?php
		require_once 'functions_db.php';
	?>
</head>

<body>
	<b>User List</b>

	<?php
		print $_SERVER['SERVER_ADDR'];

		$DB_HOST = $_SERVER['DBHOST'];
		$DB_USER = $_SERVER['DBUSER'];
		$DB_PASS = $_SERVER['DBPASS'];
		$DB_NAME = $_SERVER['DBNAME'];

		connect_db($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME);
	?>

	<br>
	<b>Add User:</b>
	<form action="user_add_delete_db.php" method="post" value=""/>
		<a>ID:</a>
		<input type="text" name="userid" value="" size="25">
		<a>Name:</a>
		<input type="text" name="username" value="" size="10">
		<input type="submit" value="Submit" />
	</form>
	<b>Delete User:</b>
	<form action="user_add_delete_db.php" method="post" value=""/>
		<a>Name:</a>
		<input type="text" name="delete_username" value="" size="10">
		<input type="submit" value="Submit" />
	</form>

	<?php
		show_db_table('users');
	?>

	<a href="https://www.jtpedu-lab.com">To:index(S3)</a><br>
	<a href="https://webapp.jtpedu-lab.com">To:Application-Server(EC2)</a><br>
	<a href="https://webapp.jtpedu-lab.com/userlist.php">To:User-List(PHP)</a><br>
</body>
</html>
