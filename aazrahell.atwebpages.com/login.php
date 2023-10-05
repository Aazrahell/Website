<?php
session_start();

include "header.php";

require_once "dbconn.php";

$login = "";
$email = "";
$errors = array();


if ($conn == false) {
    echo "Nie udalo sie polaczyc z baza danych";
    header('location: logowanie');
    exit();
} else {
    $login = $_POST['login'];
    $pass = $_POST['pass'];

    if (empty($login)) {
        array_push($errors, "login jest wymagany");
        header('location: failed');
        exit();
    }
    if (empty($pass)) {
        array_push($errors, "pass jest wymagane");
        header('location: failed');
        exit();
    }

    if (count($errors) == 0) {
        $pass = md5($pass);
        $zapytanie = "SELECT * FROM $dbName WHERE name='$login' AND pass='$pass'";
        $wynik = mysqli_query($conn, $zapytanie);
        if (mysqli_num_rows($wynik) == 1) {
            $_SESSION['id'] = $login;
            $_SESSION['success'] = "Udalo sie zalogowac!";

            echo ("<script>window.location.href = 'loginSuccess';</script>");

        } else {
            array_push($errors, "Niepoprawna nazwa lub haslo.");
            echo ("<script>window.location.href = 'failed';</script>");
            exit();
        }
    }
}
?>

<?php
include "footer.php";
?>