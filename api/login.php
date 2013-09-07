<?php 

require("db.php");
$db = new DB();
$db->run_select();
readfile("../templates/login.html");

//if(strlen($_POST['email']) > 0 and strlen($_POST['username']) > 0 and strlen($_POST['password']) > 0) 
if(isset($_POST['email']) and isset($_POST['password']))
{
	echo "loggin in email: ".($_POST['email'])."<br>";
	//CLEAN!
	$query = "SELECT password,email FROM users WHERE email = '".$_POST['email']." LIMIT 1'";

	$result = $db->run_query($query);	
	echo 'result :';

        while ($row = mysql_fetch_assoc($result))
        {
                echo " email: " . $row['email'] . " pw: " . $row['password'] . '<br>';
        }	


	$db->close();
}


else 
{
	echo "not logged in";
}



?>
