<?php
require_once 'functions_db.php';
//----------------------------------------------------------
//POSTŽó‚¯Žæ‚è—p
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $userid = htmlspecialchars($_POST["userid"], ENT_QUOTES);
        $username = htmlspecialchars($_POST["username"], ENT_QUOTES);
	$delete_username = htmlspecialchars($_POST["delete_username"], ENT_QUOTES);
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

else if(!$delete_username == ""){
	delete_data('users','username',$delete_username);
}

else{
	echo "error";
	exit(1);
}
  $close_flag = mysql_close($link);
//----------------------------------------------------------


 header("Location:./userlist.php",true,303);

?>
