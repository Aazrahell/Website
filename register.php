<?php
include "header.php";
session_start();

include "dbconn.php";

$login = $_POST['loginR'];
$email = $_POST['emailR'];
$pass = $_POST['passR'];

if (isset($login) && isset($email) && isset($pass)) {
	$sql = "INSERT INTO test.login (id, name, pass, email)
			VALUES ('','$login', '$pass', '$email')";
	$result = mysqli_query($conn, $sql);
	echo "UDALO SIE STWORZYC KONTO!";
} else {
	header('location: failed.php');
}
include "footer.php";
?>