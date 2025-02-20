<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
include "BBDD_connection/connection.php";
session_start();
$id_user = $_SESSION['id_user'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $entrada = $_POST['entrada'];
    $salida = $_POST['salida'];
    $zona = $_POST['zona'];
    $n_place = $_POST['n_place'];
    $area = $_POST['area'];
    $matricula = $_POST['plate'];
    $total = $_POST['total'];
    
    // Marcar la plaza como ocupada
    $update_query = $conn->prepare("UPDATE areas SET busy = 1 WHERE id_area = ?");
    $update_query->bind_param("i", $n_place);
    $successUpdate = $update_query->execute();
    if(!$successUpdate){
        echo "<script>alert('Error al marcar la plaza como ocupada.');</script>";
    }

    // Generar un código de reserva único
    do {
        $codigo_reserva = "R-" . rand(1000, 9999);

        $stmt = $conn->prepare("SELECT id_reservation FROM reservations WHERE reservation_code = ?");
        $stmt->bind_param("s", $codigo_reserva);
        $stmt->execute();
        $stmt->store_result();
        $existe = ($stmt->num_rows > 0);
        $stmt->close();
    } while ($existe); // Repetir si el código ya existe

    // Insertar la reserva
    $insert_query = $conn->prepare("INSERT INTO reservations (reservation_code, id_user, id_area, enter_date, exit_date, plate, total) VALUES (?, ?, ?, ?, ?, ?, ?)");
    if (!$insert_query) {
        die("Error en la consulta INSERT: " . $conn->error);
    }

    $insert_query->bind_param("siisssd", $codigo_reserva, $id_user, $area, $entrada, $salida, $matricula, $total);
    $success = $insert_query->execute();
    $insert_query->close();

    // Averiguar el nombre del area
    $stmt = $conn->prepare("SELECT area_name FROM areas WHERE id_area = ?");
    $stmt->bind_param("i", $area);
    $stmt->execute();
    $stmt->bind_result($area_name);

    if ($stmt->fetch()) {
        $area_name = $area_name;
    } else {
        die("Error: No se encontró ningún área.");
    }

    // Generar un correo de confirmación
    $mail = new PHPMailer(true);

    try {
        
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; 
        $mail->SMTPAuth   = true;
        $mail->Username   = 'proyectoswebgc@gmail.com'; 
        $mail->Password   = 'vylf fnoy ocgf ntsz'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Configuración del remitente y destinatario
        $mail->setFrom('guayracamp@gmail.com', 'Reservas GuayraCamp'); 
        $mail->addAddress($_SESSION['email']);
        $formatted_enter_date = DateTime::createFromFormat('Y-m-d', $entrada)->format('d/m/Y');
        $formatted_exit_date = DateTime::createFromFormat('Y-m-d', $salida)->format('d/m/Y');

        // Configuración del correo
        $mail->isHTML(true);
        $mail->Subject = 'Confirmación de reserva';
        $mail->Body    = "<h3>Tu reserva ha sido confirmada</h3>
                          <p>Zona: <strong>$area_name</strong></p>
                          <p>Nº de plaza: <strong>$n_place</strong></p>
                          <p>Fecha de entrada: <strong>$formatted_enter_date</strong></p>
                          <p>Fecha de salida: <strong>$formatted_exit_date</strong></p>
                          <p>Total: <strong>$total</strong></p>
                          <p>Código de reserva: <strong>$codigo_reserva</strong></p>
                          <p>Recuerda presentar este código al momento del acceso al camping.</p>";

        // Enviar el correo y si todo sale bien, redirigir al espacio personal
        if ($mail->send()) {
            header("Location: personal_space.php?success");
            exit();
        } else {
            echo "<script>alert('Error al enviar el correo de confirmación.');</script>";
        }
        return true;
    } catch (Exception $e) {
        return false;
    }
}
?>