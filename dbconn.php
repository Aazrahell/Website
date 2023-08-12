<?php

$serverName = "sql7.freemysqlhosting.net";

$dbUsername = "sql7629176";

$dbPassword = "ZnjJVNQyCC";

$dbName = "sql7629176.user";


$conn = mysqli_connect($serverName, $dbUsername, $dbPassword);

if (!$conn) {

    echo "Connection failed!";

}
?>