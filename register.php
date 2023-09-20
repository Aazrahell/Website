<?php
session_start();

include "header.php";

require_once "dbconn.php";

$login = $_POST['loginR'];
$email = $_POST['emailR'];
$pass = $_POST['passR'];
$pass = md5($pass);

if (isset($login) && isset($email) && isset($pass)) {
	$zapytanie1 = "SELECT * FROM 4323805_aazrahell.user WHERE name='$login' OR email='$email'";
	$wynik1 = mysqli_query($conn, $zapytanie1);

	//    if (mysqli_num_rows($wynik1) > 0) {
//		while($rowData = mysqli_fetch_array($wynik1)){
//  			echo $rowData["name"].'<br>';
//		}
//	}

	if (mysqli_num_rows($wynik1) == 0) {
		$sql = "INSERT INTO $dbName (id, name, pass, email)
		VALUES ('','$login', '$pass', '$email')";
		$result = mysqli_query($conn, $sql);
	} else {
		echo ("<script>window.location.href = 'failed.php';</script>");
	}
}
?>

<div class="zalogowanyUzytkownik">
	</br>Udało się utworzyć konto!</br>
	<input type="submit" href="#" onclick="history.back();" value="Powrot">
</div>

<?php
include "footer.php";
?>