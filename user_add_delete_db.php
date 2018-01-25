<?php
require_once 'functions_db.php';
//----------------------------------------------------------
//POSTŽó‚¯Žæ‚è—p
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user_name = htmlspecialchars($_POST["user_name"], ENT_QUOTES);
	$delete_user_id = htmlspecialchars($_POST["delete_user_id"], ENT_QUOTES);
    }

else {
	echo "post_error";
	exit(1);
}
//-----------------------------------------------------------

connect_db($_SERVER['DBHOST'],$_SERVER['DBUSER'],$_SERVER['DBPASS'],$_SERVER['DBNAME']);

if(!$user_name == ""){
	insert_data('users','user_name',$user_name);
}

else if(!$delete_user_id == ""){
	delete_data('users','user_id',$delete_user_id);
}

else{
	echo "query_error";
	exit(1);
}
  $close_flag = mysql_close($link);
//----------------------------------------------------------


 header("Location:./userlist.php",true,303);

?>
