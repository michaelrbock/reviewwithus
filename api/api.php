<?php 

class User 
{
	public $email;
	public $username;
	public $password; //SALT ME
	public $karma;
	public $courses;

	function __construct($email, $username, $password, $karma, $courses) 
	{
		if (strpos($email,".edu") == false)  //needs to END with
		{
			exit("bad email $email");
		} 
		$this->email = $email;
		$this->username = $username;
		$this->password = $password;
		$this->karma = $karma;
		$this->courses = $courses;
		echo "success";
	}
}


echo readfile("/home/ubuntu/CheetSheet/templates/signup.html");
echo "<br><br>";

$user = new User("my_email.edu","name","","","");




?>
