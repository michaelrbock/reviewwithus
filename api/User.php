<?php
class User
{
    public $email;
    public $username;
    public $password; //SALT ME
    public $karma;
    public $courses;

    function __construct($email, $username, $password)
    {
		$email = rtrim($email);
		if(strpos($email, strlen($email) - strlen(".edu")) != ".edu")
		{
			exit("bad email $email");
		}

        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
        $this->karma = 0;
        $this->courses = 0;
        echo "success";
    }
}
?>
