<?php

require("../../Resources/conexion.php");

require("../../Resources/headers.php");

$id = $_POST['id'];

$sql = "DELETE FROM mensajes WHERE id = '$id'";

if (mysqli_query($conn, $sql)) {

    echo "Mensaje eliminado";

}
else {

    echo "Error: " . mysqli_error($conn);

}

?>