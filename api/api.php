<?php 

echo "<br><br>";
echo readfile("../templates/signup.html");



//if(strlen($_POST['email']) > 0 and strlen($_POST['username']) > 0 and strlen($_POST['password']) > 0) 
if(isset($_POST['email']) > 0 and isset($_POST['username']) > 0 and isset($_POST['password']) > 0)
{
    echo "email: ".($_POST['email']);
    echo "why2";
    $host = "localhost"; 
    $user = "ubuntu"; 
    $r = mysql_connect($host, $user );

    if (!$r) {
            echo "Could not connect to server\n";
            trigger_error(mysql_error(), E_USER_ERROR);
    } else {
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
else 
{
	echo "nope2";
}



?>
