<?php

    require('../../Resources/conexion.php');

    require('../../Resources/headers.php');

    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    $encrypt_method = "AES-128-ECB";
    $key = 'palabra-tan-secreta-que-nadie-sabe-cual-es';

    $contrasena = openssl_encrypt($contrasena, $encrypt_method, $key);

    $sql = "INSERT INTO usuarios (nombre, correo, contrasena) VALUES ('$nombre', '$correo', '$contrasena')";

    if (mysqli_query($conn, $sql)) {
        echo "Usuario creado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);

?>