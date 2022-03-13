<?php

    require('../../Resources/conexion.php');

    require('../../Resources/headers.php');

    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $fecha = $_POST['fecha'];
    $link = $_POST['link'];
    $status = true;
    $imagen = $_FILES['imagen'];
    $imagen_nombre = $imagen['name'];
    $imagen_tipo = $imagen['type'];
    $imagen_tamanio = $imagen['size'];
    $imagen_temporal = $imagen['tmp_name'];

    $imagen_tipo_permitido = array("image/jpg", "image/jpeg", "image/png", "image/gif");

    if (in_array($imagen_tipo, $imagen_tipo_permitido)) {
        if ($imagen_tamanio < 1024000) {
            $carpeta_destino = "../../Images/noticias/";
            $ruta_destino = $carpeta_destino . $imagen_nombre;
            move_uploaded_file($imagen_temporal, $ruta_destino);
            $sql = "INSERT INTO noticias (titulo, descripcion, fecha, link, imagen, status) VALUES ('$titulo', '$descripcion', '$fecha', '$link', '$imagen_nombre', '$status')";
            if (mysqli_query($conn, $sql)) {
                echo "Noticia agregada correctamente";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "La imagen es demasiado grande";
        }
    } else {
        echo "El tipo de imagen no es permitido";
    }

?>