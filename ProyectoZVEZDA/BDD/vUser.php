<?php
include 'database.php';

$nombre = $_POST['uname'];
$contrasena = trim($_POST['pwd']);

$sql = "SELECT id, nick, passw, tipo FROM usuarios WHERE nick = '$nombre'";
$result = $mysqli->query($sql);

if ($result) {
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if ($contrasena === $row['passw']){
            if($row['tipo']!==5){
                session_start();
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['user_nick'] = $row['nick'];
                $_SESSION['user_tipo'] = $row['tipo'];
                header("Location: ../admin/index.php");
                exit();
            }else{
                session_start();
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['user_nick'] = $row['nick'];

                header("Location: ../index.php");
                
            }
        } else {
            header("Location: ../login.php?action=login&error=Contraseña incorrecta");
            exit();
        }
    } else {
        header("Location: ../login.php?action=login&error=Usuario incorrecto");
        exit();
    }
} else {
    echo "Error en la consulta: " . $mysqli->error;
}

$mysqli->close();
?>
