<?php

//DB接続
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

//DB(Table)内全データ表形式で表示
	function show_db_table_all($table){
	//Fileds表示
	 $i = 0;
	 echo "</font>"."<table border='1'>";
	 echo '<caption>'.$table.'</caption>';

	 echo '<tr>';
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
	     $n=0;
	     if($n%2==0){ echo '<tr>';}
	     else{ echo '<tr class="even">';}

	     for($m=0; $m<$fields_count; $m++){
	      echo "<td>".$data[$fields[$m]]."</td>";
	     }
	     echo "</tr>";
	     $n++;
	   }
	   echo "</table><br>";
	  }

//DB(Table)内、特定columnデータ表形式で表示
	function show_db_table_specific($table,$column1,$columns2){
	//Fileds表示
	 $i = 0;
	 echo "</font>"."<table border='1'>";
	 echo '<caption>'.$table.'</caption>';
	 echo '<tr>';
	 echo '<th>'.$column1.'</th>';
	 echo '<th>'.$column2.'</th>';
	 echo '</tr>';

	 $table_data = mysql_query("SELECT $column1,$column2 FROM $table");
	 while ($data = mysql_fetch_array($table_data, MYSQL_ASSOC)) {
	     $datas[] = $data;
	 }

	 $record_count = mysql_num_rows($table_data);
	 $fields_count = mysql_num_fields($table_data);

	   foreach($datas as $data){
	     $n=0;
	     if($n%2==0){ echo '<tr>';}
	     else{ echo '<tr class="even">';}

	     for($m=0; $m<$fields_count; $m++){
	      echo "<td>".$data[$fields[$m]]."</td>";
	     }
	     echo "</tr>";
	     $n++;
	   }
	   echo "</table><br>";
	  }

//Data追加
	function insert_data($table,$column,$value){
		$sql_insert = "INSERT INTO $table ($column) VALUES ('$value') ";
		$result_flag = mysql_query($sql_insert);
	}

//Data削除
	function delete_data($table,$column,$value){
		$sql_delete = "DELETE FROM $table WHERE $column='$value'";
		$result_flag = mysql_query($sql_delete);
	}

//Data抽出
	function select_data($table,$column,$value){
		$sql_select = "SELECT * FROM $table WHERE $column='$value'";
		$result_flag = mysql_query($sql_select);
	}

?>