<?php 
class DB{

    public $con;

    function __construct(){
        $host = "localhost"; 
        $user = "ubuntu"; 
	//phpinfo();
	ini_set('display_errors',1);
	error_reporting(E_ALL);
        $this->con = mysqli_connect($host, $user);// or die('error '.mysqli_error($r));
	//if (mysqli_connect_errno($r)) echo "failed" . mysqli_connect_error();	
        if (!$this->con) 
        {
                echo "\nCould not connect to server\n";
                trigger_error(mysql_error(), E_USER_ERROR);
        } 
        else 
        {
                $r2 = mysql_select_db("test");
                if (!$r2) 
                {
                        echo "Cannot select database\n";
                        trigger_error(mysql_error(), E_USER_ERROR); 
                } 
                
        }
    }

    function insert_user($email,$password,$username) {
        $this->run_query("INSERT INTO users (email,password,username, karma,courses) VALUES ('$email','$password','$username',0,'')");
    }




    function run_select() 
    {
        $rs = mysql_query("SELECT * FROM users");
        if (!$rs) 
        {
            echo "Could not execute query: $query";
            trigger_error(mysql_error(), E_USER_ERROR); 
            return;
        } 

        while ($row = mysql_fetch_assoc($rs)) 
        {
                echo $row['id'] . " email: " . $row['email'] . " pw: " . $row['password'] . '<br>';
        }

    }
	function close() 
	{
		mysql_close();
	}

	function delete_table() 
	{
		$this->run_query("TRUNCATE TABLE users");
	}

        function run_query($query) {
		echo $query;
		$rs = mysql_query($query);
		if (!$rs) 
		{
		    echo "Could not execute query: ".$query;
		    trigger_error(mysql_error(), E_USER_ERROR); 
		    return;
		} 
		return $rs;
	    }

	function check_duplicate($value,$field ){
		$value = mysqli_real_escape_string($this->con, $value);
		$query = sprintf("SELECT %s FROM users WHERE %s='%s' LIMIT 1",$field,$field,$value);		
		$rs = $this->run_query($query);

		if(!$rs)
		{
			echo "Could not execute query: ".$query;
			trigger_error(mysql_error(), E_USER_ERROR);
			return false;
		}

		if (mysql_fetch_array($rs) !== false) { //duplicate
			return true;
		} else {
		return false;
		}
	}	
	


}




$db = new DB();

?>

