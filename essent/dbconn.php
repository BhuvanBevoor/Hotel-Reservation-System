<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "hoteldb";
    $dbconnect = mysqli_connect($server, $username, $password,$database);
    if (!$dbconnect) {
        die ("Connection failed: " . mysqli_connect_error());
    }
?>