<!DOCTYPE html>
<html lang="ja">
        <head>
                <meta charset="UTF-8">
		<title>EC2 Instance / PHP</title>
        </head>
        <body>
                <p>User Check</p>

                <?php
                        $host = gethostname();
                        echo "<p>Host-Name : $host</p>";

			$DB_HOST = 'jtpedu-lab-db.cimjcl6wbeqk.ap-northeast-1.rds.amazonaws.com:3306';
			$DB_USER = 'dbadmin';
			$DB_PASS = 'JTPedudb1!';
			$DB_NAME = 'jtpedulabdb';

			connect_db($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME);
			display_table_data('users');

			function connect_db($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME){
			global $link; 
			$link = mysql_connect($DB_HOST,$DB_USER,$DB_PASS); 
			 if (!$link) {
			     die('Server接続失敗です。'.mysql_error());
			 }

			 $db_selected = mysql_select_db($DB_NAME,$link);
			 mysql_query('SET NAMES utf8', $link );

			 if (!$db_selected){
			     die('DB接続失敗です。'.mysql_error());
			 }
			// echo('接続に成功しました。');
			 return $link;
			}

		function display_table_data($table){
		//Fileds表示
		 $i = 0;
		 echo "</font>"."<table border='1'>";
		 echo '<caption align="left">'.$table.'</caption>';
		 echo '<tr align="center">';
		 $field_data = mysql_query("SHOW COLUMNS FROM $table");
		 while ($filed = mysql_fetch_array($field_data, MYSQL_ASSOC)) {
		     $fields[] =  $filed['Field'];
		     echo "<th>".$fields[$i]."</th>";
		     $i++;
		 }
		 echo "</tr>";

		 $table_data = mysql_query("SELECT * FROM $table");

		 while ($data = mysql_fetch_array($table_data, MYSQL_ASSOC)) {
		     $datas[] = $data;
		 }

		 $record_count = mysql_num_rows($table_data);
		 $fields_count = mysql_num_fields($table_data);

		   foreach($datas as $data){
		//    for($m=0;$m<$record_count;$m++){
		  $n=0;
		     if($n%2==0){
		      echo '<tr>';
		     }
		     else{
		      echo '<tr class="even">';
		     }
		//    echo '<tr align="center">';
		     for($m=0; $m<$fields_count; $m++){
		      echo "<td>".$data[$fields[$m]]."</td>";
		    }
		    echo "</tr>";
		    $n++;
		   }
		   echo "</table><br>";
		  }

                ?>

                <a href="https://www.jtpedu-lab.com">To:index(S3)</a><br>
                <a href="https://webapp.jtpedu-lab.com">To:Application-Server(EC2)</a><br>
                <a href="./userlist.php">To:User-List(PHP)</a><br>
        </body>
</html>
