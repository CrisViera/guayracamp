<?php
include "BBDD_connection/connection.php";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id_user = $_POST['id_user'];

    // Inicia la transacción
    $conn->begin_transaction();

    try {
        // Eliminar el usuario
        $stmt = $conn->prepare("DELETE FROM users WHERE id_user = ?");
        $stmt->bind_param("i", $id_user);
        $stmt->execute();
        $stmt->close();

        // Confirmar la transacción
        $conn->commit();
        if($_SESSION["email"] === 'admin@guayracamp.es'){
            try {
                
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com'; 
                $mail->SMTPAuth   = true;
                $mail->Username   = 'proyectoswebgc@gmail.com'; 
                $mail->Password   = 'vylf fnoy ocgf ntsz'; 
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port       = 587;
    
                // Configuración del remitente y destinatario
                $mail->setFrom('guayracamp@gmail.com', 'Admimistración GuayraCamp'); 
                $mail->addAddress($campos['email']);
    
                // Configuración del correo
                $mail->isHTML(true);
                $mail->Subject = 'Administración GuayraCamp';
                $mail->Body    = "<h3>Eliminación de usuario</h3>
                                <p>Desde la administración de GuayraCamp - EcoExperience lamentamos informarle
                                que su usuario, vinculado al email ". $campos['email'] ."ha sido eliminado por
                                 no cumplir con las políticas de la empresa.</p>
                                <p>Si considera que ha sido un error contacta con nosotros a través de clientes@guayracamp.es
                                 indicando el motivo y las alegaciones oportunas.</p>
                                <p>Lamentamos las molestias que esta decisión le hayan ocasionado.</p>";
    
                // Enviar el correo y si todo sale bien, redirigir al espacio personal
                if ($mail->send()) {
                    session_start();
                    $_SESSION['email'] = $campos['email'];
                    header("Location: personal_space.php?success");
                    exit();
                } else {
                    echo "<script>alert('Error al enviar el correo de eliminación de usuario.');</script>";
                }
                return true;
            } catch (Exception $e) {
                return false;
            }
            header("Location: administration.php?success=1");
            exit();
        }
        

    } catch (Exception $e) {
        // Si ocurre un error, revertir la transacción
        $conn->rollback();
        header("Location: administration.php?error=1");
    }

    // Cerrar conexión
    $conn->close();
}
?>