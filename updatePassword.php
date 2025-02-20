<?php
include 'BBDD_connection/connection.php';
// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $password = trim($_POST["passwordUsuario"]);
    $newPassword = trim($_POST["newPassword"]);
    $confirmPassword = trim($_POST["confirmPassword"]);

    // Verifica que todos los campos están llenos
    if (!empty($password) && !empty($newPassword) && !empty($confirmPassword)) {

        // Verifica que la nueva contraseña y la confirmación coinciden
        if ($newPassword !== $confirmPassword) {
            header("Location: personal_space.php?error=Las contraseñas no coinciden");
            exit();
        }

        // Obtener la contraseña actual en la base de datos
        $stmt = $conn->prepare("SELECT user_password FROM users WHERE email = ?");
        if (!$stmt) {
            die("Error en la consulta: " . $conn->error);
        }

        $stmt->bind_param("i", $_SESSION["email"]);
        $stmt->execute();
        $stmt->store_result();

        // Verificar si se encontró el usuario
        if ($stmt->num_rows === 0) {
            header("Location: personal_space.php?error=Usuario no encontrado");
            exit();
        }

        $stmt->bind_result($password_hashed);
        $stmt->fetch();
        $stmt->close();

        // Verificar que la contraseña actual sea correcta
        if (!password_verify($password, $password_hashed)) {
            header("Location: personal_space.php?error=Contraseña actual incorrecta");
            exit();
        }

        // Hashear la nueva contraseña
        $hashed_password = password_hash($newPassword, PASSWORD_DEFAULT);

        // Actualizar la nueva contraseña en la base de datos
        $stmt = $conn->prepare("UPDATE users SET user_password = ? WHERE id_user = ?");
        if (!$stmt) {
            die("Error en la consulta de actualización: " . $conn->error);
        }

        $stmt->bind_param("si", $hashed_password, $id_user);
        if ($stmt->execute()) {
            header("Location: personal_space.php?msg=Contraseña actualizada correctamente");
            exit();
        } else {
            die("Error al actualizar la contraseña: " . $stmt->error);
        }

        $stmt->close();
    } else {
        header("Location: personal_space.php?error=Todos los campos son obligatorios");
        exit();
    }
}

$conn->close();
?>