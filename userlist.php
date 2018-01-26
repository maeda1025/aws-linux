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
	?>

	<br>
	<b>Add User:</b>
	<form action="user_add_delete_db.php" method="post" value=""/>
		<a>Name:</a>
		<input type="text" name="user_name" value="" size="10">
		<input type="text" name="user_password" value="" size="10">
		<input type="submit" value="Add" />
	</form>
	<br>
	<b>Delete User:</b>
	<form action="user_add_delete_db.php" method="post" value=""/>
		<a>UserID:</a>
		<input type="text" name="delete_user_id" value="" size="10">
		<input type="submit" value="Delete" />
	</form>

	<?php
		connect_db($_SERVER['DBHOST'],$_SERVER['DBUSER'],$_SERVER['DBPASS'],$_SERVER['DBNAME']);
//		show_db_table_all('users','user_id','user_name');
		show_db_table_all('users');
	?>

	<a href="https://www.jtpedu-lab.com">To:index(S3)</a><br>
	<a href="https://webapp.jtpedu-lab.com">To:Application-Server(EC2)</a><br>
	<a href="https://webapp.jtpedu-lab.com/userlist.php">To:User-List(PHP)</a><br>
</body>
</html>
