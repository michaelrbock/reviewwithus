<?php 


class DB {

    

    function __construct(){
        $host = "localhost"; 
        $user = "ubuntu"; 
        $r = mysql_connect($host, $user);

	echo "constructing";
        if (!$r) 
        {
                echo "Could not connect to server\n";
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
	echo "consturcted";
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
                echo $row['id'] . " " . $row['username'] . " " . $row['password'];
        }

    }
	function close() 
	{
		mysql_close();
	}


}
$db = new DB();
?>

