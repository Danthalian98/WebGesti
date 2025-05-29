<?php
include 'database.php';

$nombre = $_POST['uname'];
$correo = $_POST['correo'];
$contrasena = $_POST['pwd'];

$sql = "INSERT INTO usuarios (nick, correo, passw, permiso) VALUES ('$nombre', '$correo', '$contrasena', 'Comentar')";

if ($mysqli->query($sql) === TRUE) {
    $sql = "SELECT id FROM usuarios WHERE nick = '$nombre' AND correo = '$correo'";
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();

    session_start();
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['user_nick'] = $nombre;

    header("Location: ../index.php");
    exit();
} else {
    echo "Error al crear el usuario: " . $mysqli->error;
}

$mysqli->close();
?>
