<?php 


class DB {

    

    function __construct(){
        $host = "localhost"; 
        $user = "ubuntu"; 
        $r = mysql_connect($host, $user );

        if (!$r) 
        {
                echo "Could not connect to server\n";
                trigger_error(mysql_error(), E_USER_ERROR);
        } 
        else 
        {
                echo "Connection established\n"; 
                $r2 = mysql_select_db("test");

                if (!$r2) {
                        echo "Cannot select database\n";
                            trigger_error(mysql_error(), E_USER_ERROR); 
                } else {
                        echo "Database selected\n";
                }


                $rs = mysql_query("SELECT * FROM users");
                if (!$rs) {
                        echo "Could not execute query: $query";
                            trigger_error(mysql_error(), E_USER_ERROR); 
                } else {
                        echo "Query: query executed\n";
                } 

                while ($row = mysql_fetch_assoc($rs)) {
                        echo $row['id'] . " " . $row['username'] . " " . $row['password'] . "\n";
                }

                mysql_close();
        }
    }
}
$db = new DB();


?>
