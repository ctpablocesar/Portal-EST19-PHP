<?php

    require("../../Resources/conexion.php");

    require("../../Resources/headers.php");

    $sql = "SELECT * FROM imagenes";

    $result = mysqli_query($conn, $sql);

    $imagenes = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $imagenes[] = $row;
    }

    echo json_encode($imagenes);

    mysqli_close($conn);

?>