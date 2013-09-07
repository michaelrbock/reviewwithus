<?php 

require("db.php");
$db = new DB();
#$db->run_select();
echo readfile("../templates/login.html");

//if(strlen($_POST['email']) > 0 and strlen($_POST['username']) > 0 and strlen($_POST['password']) > 0) 
if(isset($_POST['email']) and isset($_POST['password']))
{
	echo "loggin in email: ".($_POST['email']);
	$query = "SELECT password FROM users WHERE email = '".$_POST['email']." LIMIT 1'";

	$result = $db->run_select($query);	
	echo 'result '.$result;

	$db->close();
}


else 
{
	echo "not logged in";
}



?>
