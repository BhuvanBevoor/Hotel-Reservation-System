<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "hoteldb";
    $dbconnect2 = mysqli_connect($server, $username, $password,$database);
    if (!$dbconnect2) {
        die ("Connection failed: " . mysqli_connect_error());
    }
?>