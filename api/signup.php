<?php 
readfile("../templates/signup.html");
require("db.php");
$db = new DB();

//$db->run_select();
//if(strlen($_POST['email']) > 0 and strlen($_POST['username']) > 0 and strlen($_POST['password']) > 0) 
if(isset($_POST['email']) and isset($_POST['username']) and isset($_POST['password']))
{
	if ( $db->check_duplicate($_POST['email'],'email' ) or $db->check_duplicate($_POST['username'],'username' )  )   
	{
		echo "<script>alert('Our records show your email/username exists in our database.')</script>";
		return;
	}

	$db->insert_user($_POST['email'],$_POST['password'],$_POST['username']);
	$db->run_select();
	$db->close();
	setcookie("U", make_secure_val($_POST['username']), time()+60*60*24*30, '/');
	header( 'Location: ./courses.php' );
	die();
}
else 
{
	echo "not logged in";
}

?>
