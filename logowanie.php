<?php
include "header.php";

session_start();

include "dbconn.php";

//$sql = "SELECT * FROM test.login WHERE name='$login' AND pass='$pass'";

$sql = "SELECT * FROM sql7629176.user";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

/*
if(isset($_POST['login']) && isset($_POST['pass'])){

    $_SESSION['user'] = $_POST['login'];
}
*/


?>

<table>
    <tr>
        <td class=komorka>
            <h2> Zaloguj sie </h2>
            <form action="login.php" method="post">
                <div class="panelLogowania">
                    <label>Nazwa uzytkownika</label> </br>
                    <input type="text" name="login"> </br>
                    <label>Haslo</label> </br>
                    <input type="password" name="pass"> </br>
                    <input type="submit" class="button" value="Zaloguj sie">
                </div>
            </form>
        </td>

        <td class=komorka>
            <h2> Zarejestruj sie </h2>
            <form action="register.php" method="post">
                <div class="panelRejestracji">
                    <label>Podaj nazwe</label> </br>
                    <input type="text" name="loginR"> </br>
                    <label>Podaj email</label> </br>
                    <input type="text" name="emailR"> </br>
                    <label>Podaj haslo</label> </br>
                    <input type="password" name="passR"> </br>
                    <input type="submit" name="submit2" value="Zarejestruj sie">
                </div>
            </form>
        </td>
    </tr>
</table>

<?php
include "footer.php";
?>