<?php 

require("db.php");
$db = new DB();
readfile("../templates/login.html");

//if(strlen($_POST['email']) > 0 and strlen($_POST['username']) > 0 and strlen($_POST['password']) > 0) 
if(isset($_POST['email']) and isset($_POST['password']))
{
	echo "loggin in email: ".($_POST['email'])."<br>";
	//CLEAN!
<<<<<<< HEAD
	$query = "SELECT password,email FROM users WHERE email = '".$_POST['email']."' AND password='".$_POST['password']."' LIMIT 1";
=======
	$email = mysqli_real_escape_string($this->con, $email);
	$query = sprintf("SELECT password,email FROM users WHERE email ='%s' LIMIT 1", $email);
>>>>>>> 79323a27e249803321b090743b01297c23b1f60b

	$result = $db->run_query($query);	
	echo 'result :'.$result;

	if (mysql_fetch_array($result) !== false)
	{
		echo "<script>alert('log in baby')</script>";
	}
	$db->close();

	header('Location: http://google.com');
}


else 
{
//	echo "not logged in";
}



?>
