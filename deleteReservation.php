<?php
include "BBDD_connection/connection.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['id_reserva'])) {
    $id_reserva = $_POST['id_reserva'];

    // Iniciar la transacción
    $conn->begin_transaction();

    try {
        // Obtener el id del área
        $stmt = $conn->prepare("SELECT id_area FROM reservations WHERE id_reservation = ?");
        $stmt->bind_param("i", $id_reserva);
        $stmt->execute();
        $stmt->bind_result($id_area);

        if ($stmt->fetch()) {
            $stmt->close();

            // Liberar la plaza
            $stmt = $conn->prepare("UPDATE areas SET busy = 0 WHERE id_area = ?");
            $stmt->bind_param("i", $id_area);
            $stmt->execute();
            $stmt->close();
        } else {
            $stmt->close();
        }

        // Eliminar la reserva
        $stmt = $conn->prepare("DELETE FROM reservations WHERE id_reservation = ?");
        $stmt->bind_param("i", $id_reserva);
        $stmt->execute();
        $stmt->close();

        // Confirmar la transacción
        $conn->commit();

        // Redireccionar dependiendo del usuario
        if (isset($_SESSION["email"]) && $_SESSION["email"] !== 'admin@guayracamp.es') {
            header("Location: personal_space.php");
        } else {
            header("Location: administration.php");
        }
        exit();
    } catch (Exception $e) {
        // Si hay un error, revertir la transacción
        $conn->rollback();
        // Redireccionar dependiendo del usuario
        if (isset($_SESSION["email"]) && $_SESSION["email"] !== 'admin@guayracamp.es') {
            header("Location: personal_space.php?error=1");
        } else {
            header("Location: administration.php?error=2");
        }
    }
}

$conn->close();
?>
