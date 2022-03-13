<?php

    require("../../Resources/conexion.php");

    require("../../Resources/headers.php");

    $id = $_POST['id'];
    $status = $_POST['status'];
    if ($status == "true") {
        $status = true;
    } else {
        $status = false;
    }

    $sql = "SELECT * FROM imagenes WHERE id = '$id'";

    if(mysqli_query($conn, $sql)) {
        $sql = "UPDATE imagenes SET status = '$status' WHERE id = '$id'";
        if (mysqli_query($conn, $sql)) {
            echo "Imagen actualizada correctamente";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

?>