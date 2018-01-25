<?php

	function connect_db($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME){
	global $link; 
	$link = mysql_connect($DB_HOST,$DB_USER,$DB_PASS); 
	 if (!$link) {
	     die('ServerÚ‘±Ž¸”s‚Å‚·B'.mysql_error());
	 }

	 $db_selected = mysql_select_db($DB_NAME,$link);
	 mysql_query('SET NAMES utf8', $link );

	 if (!$db_selected){
	     die('DBÚ‘±Ž¸”s‚Å‚·B'.mysql_error());
	 }
	// echo('Ú‘±‚É¬Œ÷‚µ‚Ü‚µ‚½B');
	 return $link;
	}

	function show_db_table($table){
	//Fileds•\Ž¦
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

	function insert_data($table,$column1,$value1,$column2,$value2){
		$sql_insert = "INSERT INTO $table ($column1,$column2) VALUES ('$value1','$value2') ";
		$result_flag = mysql_query($sql_insert);
	}

	function delete_data($table,$column,$value){
		$sql_delete = "DELETE FROM $table WHERE $column ('$value')";
		$result_flag = mysql_query($sql_delete);
	}

?>