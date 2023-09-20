<?php
session_start();

include "header.php";
require_once "dbconn.php";

if (!isset($_SESSION['id']) || (trim($_SESSION['id']) == '')) {
    header('index.php');
    exit();
}

$query = mysqli_query($conn, "SELECT * FROM 4323805_aazrahell.user WHERE name='" . $_SESSION['id'] . "'");
$row = mysqli_fetch_assoc($query);
?>

<div class="zalogowanyUzytkownik">
    <h2> Witaj
        <?php echo $row['name']; ?>
    </h2>
    </br>
    <h3> <a href="logout.php">Logout</a> </h3></br>
</div>

</html>