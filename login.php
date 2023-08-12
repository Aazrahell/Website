<?php
include "header.php";
session_start();

require_once "dbconn.php";

$login = "";
$email = "";
$errors = array();


if ($conn == false) {
    echo "Nie udalo sie polaczyc z baza danych";
    header('location: logowanie.php');
    exit();
} else {
    $login = $_POST['login'];
    $pass = $_POST['pass'];

    if (empty($login)) {
        array_push($errors, "login jest wymagany");
        header('location: failed.php');
        exit();
    }
    if (empty($pass)) {
        array_push($errors, "pass jest wymagane");
        header('location: failed.php');
        exit();
    }

    if (count($errors) == 0) {
        // $pass = md5($pass);
        $zapytanie = "SELECT * FROM sql7629176.user WHERE name='$login' AND pass='$pass'";
        $wynik = mysqli_query($conn, $zapytanie);
        if (mysqli_num_rows($wynik) == 1) {
            $_SESSION['login'] = $login;
            $_SESSION['success'] = "Udalo sie zalogowac!";
        } else {
            array_push($errors, "Niepoprawna nazwa lub haslo.");
            header('location: failed.php');
            exit();
        }
    }
}
?>

<!-- <div id="container">
        <div id="logo"> Nauka gry w warcaby </div>

        <div id="menu">
            <div class="option">
                <a href="index.php" class="link"> Strona Glowna </a>
            </div>
            <div class="option">
                <a href="nauka.php" class="link"> Nauka </a>
            </div>
            <div class="option"> Statystyki </div>
            <div class="option"> Ciekawostki </div>
            <div class="option"> Ankiety </div>
            <div class="option"> Zglos </div>
            <div class="option">
                <a href="logowanie.php" class="link"> Logowanie </a>
            </div>
            <div style="clear:both;"> </div>
        </div>
    </div> -->


<div class=zalogowanyUzytkownik>
    <label>
        <?php echo "<p>Witaj " . $login . "!"; ?> </br>
        Zostales poprawnie zalogowany!
    </label> </br> </br>
    <label>Wcisnij przycisk, aby wrocic </br> na strone glowna.</label> </br> </br>
    <button type="button" onClick="document.location.href='index.php'">Strona Glowna</button>
</div>

<?php
include "footer.php";
?>