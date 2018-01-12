<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<title>hello</title>
	</head>
	<body>
		<p>PHP-Page</p>

		<?php
			$host-name = gethostname();
			echo "<p>Host-Name : $host-name</p><br>";
		?>

		<a href="http://www.jtpedu-lab.com">To:index(S3)</a><br>
		<a href="http://apptest.jtpedu-lab.com">To:Application-Server(EC2)</a><br>
		<a href="./phpinfo.php">To:PHP-Page</a><br>
	</body>
</html>