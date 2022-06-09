<?php

    $dbname = "Plantdb";
    $servername = "localhost";
    $user = "root";
    $pass = "";

    $conn = mysqli_connect($servername, $user, $pass, $dbname);

    if (!$conn) {
        die("<script>alert('Connection Failed.')</script>");
    }
?>