<?php
require_once 'db_functions.php';
//----------------------------------------------------------
//POSTŽó‚¯Žæ‚è—p
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $userid = htmlspecialchars($_POST["userid"], ENT_QUOTES);
        $username = htmlspecialchars($_POST["username"], ENT_QUOTES);
    }
else {
	echo "error";
	exit(1);
}
//-----------------------------------------------------------

$DB_HOST = $_SERVER['DBHOST'];
$DB_USER = $_SERVER['DBUSER'];
$DB_PASS = $_SERVER['DBPASS'];
$DB_NAME = $_SERVER['DBNAME'];

connect_db($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME);
insert_data('users','userid',$userid,'username',$username);

//disconnect_db($link);
  $close_flag = mysql_close($link);
//----------------------------------------------------------


 header("Location:./userlist.php",true,303);

?>
