<?php
include "BBDD_connection/conexion.php";
session_start();

// Comprobamos si el método de la petición es POST y limpiamos los datos
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    // Comprobamos si los campos no están vacíos y si el usuario está registrado
    if (!empty($email) && !empty($password)) {
        // Preparamos la consulta
        $stmt = $conn->prepare("SELECT correo, contrasena FROM usuarios WHERE correo = ?");
        // Enlazamos los parámetros
        $stmt->bind_param("s", $email);
        // Ejecutamos la consulta
        $stmt->execute();
        // Almacenamos el resultado
        $stmt->store_result();

        // Si el usuario está registrado 
        if ($stmt->num_rows > 0) {
            // Enlazamos los resultados
            $stmt->bind_result($correo, $contraseña_encryptada);
            // Obtiene el primer resultado
            $stmt->fetch();
            // Comparar la contraseña
            if (password_verify($password, $contraseña_encryptada)) {
                $_SESSION["correo"] = $correo;
                header("Location: espacio_personal/espacio_personal.php");
                exit();
            } else {
                header("Location: login.php?codError=2");
                exit();
            }
        } else {
            header("Location: login.php?codError=1");
            exit();
        }
        $stmt->close();
    } else {
        header("Location: login.php?codError=3");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}
?>
