<?php

require("../../Resources/conexion.php");

require("../../Resources/headers.php");

$sql = "SELECT * FROM calendario WHERE id = '1'";

$result = mysqli_query($conn, $sql);

$calendario = mysqli_fetch_assoc($result);

$img = $calendario['imagen'];

if (unlink("../../Images/$img")) {


}
else {

    echo "Error al eliminar el calendario";

}

$imagen = $_FILES['imagen'];
$imagen_nombre = $imagen['name'];
$imagen_tipo = $imagen['type'];
$imagen_tamanio = $imagen['size'];
$imagen_temporal = $imagen['tmp_name'];

$imagen_tipo_permitido = array("image/jpg", "image/jpeg", "image/png", "image/gif");

if (in_array($imagen_tipo, $imagen_tipo_permitido)) {
    if ($imagen_tamanio < 1024000) {
        $carpeta_destino = "../../Images/";
        $ruta_destino = $carpeta_destino . $imagen_nombre;
        move_uploaded_file($imagen_temporal, $ruta_destino);
        $sql = "UPDATE calendario SET imagen = '$imagen_nombre' WHERE id = '1'";
        if (mysqli_query($conn, $sql)) {
            echo "Imagen agregada correctamente";
        }
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    else {
        echo "La imagen es demasiado grande";
    }
}
else {
    echo "El tipo de imagen no es permitido";
}

?>