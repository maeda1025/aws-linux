<?php
require_once 'functions_db.php';
//----------------------------------------------------------
//POST�󂯎��p
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $userid = htmlspecialchars($_POST["userid"], ENT_QUOTES);
        $username = htmlspecialchars($_POST["username"], ENT_QUOTES);
	$delet_username = htmlspecialchars($_POST["delete_username"], ENT_QUOTES);
    }

else {
	echo "error";
	exit(1);
}
//-----------------------------------------------------------

connect_db($_SERVER['DBHOST'],$_SERVER['DBUSER'],$_SERVER['DBPASS'],$_SERVER['DBNAME']);

if(!$username == ""){
	insert_data('users','userid',$userid,'username',$username);
}

elseif(!$delete_username = ""){
	delete_data('users','username',$delete_name);
}
//disconnect_db($link);
  $close_flag = mysql_close($link);
//----------------------------------------------------------


 header("Location:./userlist.php",true,303);

?>