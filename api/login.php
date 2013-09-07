<?php 
require("db.php");
$db = new DB();
//$db->run_select();
readfile("../templates/login.html");

if(isset($_POST['email']) and isset($_POST['password']))
{
	$email = mysqli_real_escape_string($db->con, $_POST['email']);
	$password = mysqli_real_escape_string($db->con, $_POST['password']);
	$query = sprintf("SELECT password,email FROM users WHERE email ='%s' and password='%s' LIMIT 1", $email, $password);
	$result = $db->run_query($query);	
	
	if (mysql_fetch_array($result) !== false)
	{
		echo "<script>alert('log in baby')</script>";
		//header('Location: http://google.com');
	}
	$db->close();
}


else 
{
//	echo "not logged in";
}
?>
