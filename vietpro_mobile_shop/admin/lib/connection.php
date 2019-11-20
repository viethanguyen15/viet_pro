<?php
    $username = "root";
    $pass = "";
    $host = "localhost";
    $database = "vietpro_mobile";
    $conn = mysqli_connect($host, $username, $pass, $database) or die("fail");
    mysqli_query($conn, "SET NAMES 'UTF8'");
?>