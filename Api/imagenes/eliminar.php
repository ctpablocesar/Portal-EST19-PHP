<?php

require("../../Resources/conexion.php");

require("../../Resources/headers.php");

$id = $_POST['id'];

$sql = "SELECT * FROM imagenes WHERE id = '$id'";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

$imagen = $row['imagen'];

if (unlink($imagen)) {

    $sql = "DELETE FROM imagenes WHERE id = '$id'";

    if (mysqli_query($conn, $sql)) {

        echo "Imagen eliminada";

    }
    else {

        echo "Error: " . mysqli_error($conn);

    }

}
else {

    echo "Error al eliminar la imagen";

}

?>