<?php

    require('../../Resources/conexion.php');

    require('../../Resources/headers.php');

    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $fecha = $_POST['fecha'];
    $status = $_POST['status'];
    if ($status == "true") {
        $status = true;
    }else{
        $status = false;
    }
    $link = $_POST['link'];
    $imagen = $_FILES['imagen'];
    $imagen_nombre = $imagen['name'];
    $imagen_tipo = $imagen['type'];
    $imagen_tamanio = $imagen['size'];
    $imagen_temporal = $imagen['tmp_name'];

    $imagen_tipo_permitido = array("image/jpg", "image/jpeg", "image/png", "image/gif");

    $sql = "SELECT * FROM noticias WHERE id = '$id'";

    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);

    $imagen_actual = $row['imagen'];

    if (in_array($imagen_tipo, $imagen_tipo_permitido)) {
        if ($imagen_tamanio < 1024000) {
            $carpeta_destino = "../../Images/noticias/";
            $ruta_destino = $carpeta_destino . $imagen_nombre;
            move_uploaded_file($imagen_temporal, $ruta_destino);
            $sql = "UPDATE noticias SET titulo = '$titulo', descripcion = '$descripcion', fecha = '$fecha', link = '$link', imagen = '$imagen_nombre', status = '$status' WHERE id = '$id'";
            if (mysqli_query($conn, $sql)) {
                if ($imagen_actual != "") {
                    unlink("../../Images/noticias/$imagen_actual");
                }
                echo "Noticia actualizada correctamente";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "La imagen es demasiado grande";
        }
    } else {
        echo "El tipo de imagen no es permitido";
    }

    mysqli_close($conn);

?>