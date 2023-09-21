<?php
session_start();
?>

<!DOCTYPE HTML>
<html lang="pl">

<head>
    <meta charset="utf-8" />
    <title> Strona glowna </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="stylesheet" href="HTDOCS/style.css" type="text/css" />

    <style>
        .dropbtn {
            content: "▼";
            font-family: Serif;
            flex-grow: 1;
            font-size: 25px;
            padding: 15px 50px;
            opacity: 0.9;
            text-align: center;
            background-color: #303030;
            border: none;
            cursor: pointer;

        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            text-align: center;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 73px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: grey;
            cursor: pointer;
        }

        .dropdown:hover .dropdown-content {
            background-color: white;
            display: block;
        }

        .dropdown:hover .dropbtn {
            background-color: black;
        }

        .dropbtn:after {
            color: white;
            content: "▼";
            font-size: 15px;
        }
    </style>
</head>

<body>
    <div id="logo"> Moja strona </div>

    <div class="menu">
        <div class="option">
            <a href="index.php" class="link"> Strona Glowna </a>
        </div>
        <div class="option"> Nauka </div>
        <div class="option"> Statystyki </div>
        <div class="option"> Ciekawostki </div>
        <div class="option"> Ankiety </div>
        <div class="option"> Zglos </div>
        <?php

        if (isset($_SESSION['id'])) {
            echo '<div class="dropdown">';
            echo '<button class="dropbtn">';
            echo '<a href="loginSuccess.php" class="link">' . strtoupper($_SESSION["id"][0]) . strtolower(substr($_SESSION["id"], 1, strlen($_SESSION["id"]))) . '  </a>';
            echo '</button>';
            echo '<div class="dropdown-content">';
            echo '<a href="#">Profil</a>';
            echo '<a href="#">Ustawienia</a>';
            echo '<a href="logout.php">Wyloguj</a>';
            echo '</div>';
        } else {
            echo '<div class="option">';
            echo '<a href="logowanie.php" class="link"> Logowanie </a>';
            echo '</div>';
        }
        ?>

    </div>
    <div style="clear:both;"> </div>
    </div>