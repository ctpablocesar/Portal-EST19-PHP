<?php

    require("../../Resources/conexion.php");

    require("../../Resources/headers.php");

    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $asunto = $_POST['asunto'];
    $mensaje = $_POST['mensaje'];

    $sql = "INSERT INTO mensajes (nombre, telefono, correo, asunto, mensaje) VALUES ('$nombre', '$telefono', '$correo', '$asunto', '$mensaje')";

    if (mysqli_query($conn, $sql)) {
        echo "Mensaje enviado correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);

?>