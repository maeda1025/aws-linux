<?php

//DB�ڑ�
	function connect_db($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME){
	global $link; 
	$link = mysql_connect($DB_HOST,$DB_USER,$DB_PASS); 
	 if (!$link) {
	     die('Server�ڑ����s�ł��B'.mysql_error());
	 }

	 $db_selected = mysql_select_db($DB_NAME,$link);
	 mysql_query('SET NAMES utf8', $link );

	 if (!$db_selected){
	     die('DB�ڑ����s�ł��B'.mysql_error());
	 }
	// echo('�ڑ��ɐ������܂����B');
	 return $link;
	}

//DB(Table)���S�f�[�^�\�`���ŕ\��
	function show_db_table_all($table){
	//Fileds�\��
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

//DB(Table)���A����column�f�[�^�\�`���ŕ\��
	function show_db_table_specific($table,$column1,$columns2){
	//Fileds�\��
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

//Data�ǉ�
	function insert_data($table,$column,$value){
		$sql_insert = "INSERT INTO $table ($column) VALUES ('$value') ";
		$result_flag = mysql_query($sql_insert);
	}

//Data�폜
	function delete_data($table,$column,$value){
		$sql_delete = "DELETE FROM $table WHERE $column='$value'";
		$result_flag = mysql_query($sql_delete);
	}

//Data���o
	function select_data($table,$column,$value){
		$sql_select = "SELECT * FROM $table WHERE $column='$value'";
		$result_flag = mysql_query($sql_select);
	}

?>