<?php
require_once 'functions_db.php';
//----------------------------------------------------------
//POSTŽó‚¯Žæ‚è—p
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user_id = htmlspecialchars($_POST["user_id"], ENT_QUOTES);
        $user_name = htmlspecialchars($_POST["user_name"], ENT_QUOTES);
	$delete_username = htmlspecialchars($_POST["delete_username"], ENT_QUOTES);
    }

else {
	echo "error";
	exit(1);
}
//-----------------------------------------------------------

connect_db($_SERVER['DBHOST'],$_SERVER['DBUSER'],$_SERVER['DBPASS'],$_SERVER['DBNAME']);

if(!$username == ""){
	insert_data('users','user_id',$user_id,'user_name',$user_name);
}

else if(!$delete_username == ""){
	delete_data('users','user_name',$delete_username);
}

else{
	echo "error";
	exit(1);
}
  $close_flag = mysql_close($link);
//----------------------------------------------------------


 header("Location:./userlist.php",true,303);

?>
