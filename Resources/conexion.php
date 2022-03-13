<?php

    $servername = "localhost";
    $database = "portal-est19";
    $username = "root";
    $password = "";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Conexion fallida: " . mysqli_connect_error());
    }

?>