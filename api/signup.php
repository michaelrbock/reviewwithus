<?php 

readfile("../templates/signup.html");
require("db.php");
$db = new DB();
$db->run_select();
//if(strlen($_POST['email']) > 0 and strlen($_POST['username']) > 0 and strlen($_POST['password']) > 0) 
if(isset($_POST['email']) and isset($_POST['username']) and isset($_POST['password']))
{

	echo "WHY";
	echo "checking exists".$db->check_duplicate_email($_POST['email']);

	$db->insert_user($_POST['email'],$_POST['password'],$_POST['username']);
	$db->run_select();
	$db->close();
}


else 
{
	echo "not logged in";
}



?>
