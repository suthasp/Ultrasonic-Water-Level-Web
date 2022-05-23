<?php 

    $servername = "localhost";
    $username = "folkzaco_jayar";
    $password = "#5D)aY2Ixj2b0S";
    $dbname = "folkzaco_folkza";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

?>