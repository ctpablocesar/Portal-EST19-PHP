<?php

    require('../../Resources/conexion.php');

    require('../../Resources/headers.php');

    $sql = "SELECT * FROM anuncios";

    $result = mysqli_query($conn, $sql);

    $json = array();

    while($row = mysqli_fetch_array($result)){
        $json[] = array(
            'id' => $row['id'],
            'titulo' => $row['titulo'],
            'descripcion' => $row['descripcion'],
            'fecha' => $row['fecha'],
            'imagen' => $row['imagen'],
            'status' => $row['status'],
            'link' => $row['link']
        );
    }

    $jsonstring = json_encode($json);

    echo $jsonstring;

    mysqli_close($conn);

?>