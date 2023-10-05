<?php
session_start();

include "header.php";
require_once "dbconn.php";

if (!isset($_SESSION['id']) || (trim($_SESSION['id']) == '')) {
    header('Location: /');
    exit();
}

$query = mysqli_query($conn, "SELECT * FROM 4323805_aazrahell.user WHERE name='" . $_SESSION['id'] . "'");
$row = mysqli_fetch_assoc($query);
?>
<style>
    h2 {
        font-size: 40px;
        color: black;
        font-weight: bold;
        text-align: center;
    }
</style>

<div class="zalogowanyUzytkownik">
    <h2> Witaj
        <?php echo $_SESSION['id']; ?>
    </h2>

</div>

</html>