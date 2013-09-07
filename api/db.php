<?php 
class DB{
    function __construct(){
        $host = "localhost"; 
        $user = "ubuntu"; 
	//phpinfo();
	//ini_set('display_errors',1);
	//error_reporting(E_ALL);
        $r = mysql_connect($host, $user);// or die('error '.mysqli_error($r));
	//if (mysqli_connect_errno($r)) echo "failed" . mysqli_connect_error();	
        if (!$r) 
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
	echo " constructed";
    }

    function insert_user($email,$password,$username) {
        $this->run_query("INSERT INTO users (email,password,username, karma,courses) VALUES ('$email','$password','$username',0,'')");
    }



    function run_query($query) {
        $rs = mysql_query($query);
        if (!$rs) 
        {
            echo "Could not execute query: ".$query;
            trigger_error(mysql_error(), E_USER_ERROR); 
            return;
        } 
        return $rs;
    }

    function run_select() {
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
}
?>

