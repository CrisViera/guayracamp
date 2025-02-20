<?php
include "BBDD_connection/connection.php";
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['id_reserva'])) {
    $id_reserva = $_POST['id_reserva'];

    // Liberar la plaza
    $stmt = $conn->prepare("SELECT id_area FROM reservations WHERE id_reservation = ?");
    $stmt->bind_param("i", $id_reserva);
    $stmt->execute();
    $stmt->bind_result($id_area);
    $stmt->fetch();
    $stmt->close();
    if(isset($id_area)){
        $stmt = $conn->prepare("UPDATE areas SET busy = FALSE WHERE id_area = ?");
        $stmt->bind_param("i", $id_area);
        $stmt->execute();
    }
    $stmt = $conn->prepare("DELETE FROM reservations WHERE id_reservation = ?");
    $stmt->bind_param("i", $id_reserva);
    if ($stmt->execute()) {
        header("Location: personal_space.php");
        exit();
    }
}

$conn->close();
?>