<?php
include 'database.php';

$nombre = $_POST['uname'];
$comentario = $_POST['comen'];

$sql = "INSERT INTO cComentarios (nombre, comentario) VALUES ('$nombre', '$comentario')";

if ($mysqli->query($sql) === TRUE) {
    header("Location: ../comentarios.php");
    exit();
} else {
    echo "Error al crear el comentario: " . $mysqli->error;
}

$mysqli->close();
?>
