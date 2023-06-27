<?php

$serverName = "localhost";

$dbUsername = "root";

$dbPassword = "";

$dbName = "test.login";


$conn = mysqli_connect($serverName, $dbUsername, $dbPassword);

if (!$conn) {

    echo "Connection failed!";

}
?>