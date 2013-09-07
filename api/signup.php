<?php 

readfile("../templates/signup.html");
require("db.php");
$db = new DB();

//if(strlen($_POST['email']) > 0 and strlen($_POST['username']) > 0 and strlen($_POST['password']) > 0) 
if(isset($_POST['email']) and isset($_POST['username']) and isset($_POST['password']))
{
	echo "loggin in email: ".($_POST['email']);
	$db->insert_user($_POST['email'],$_POST['password'],$_POST['username']);
	$db->close();
}


else 
{
	echo "not logged in";
}



?>
