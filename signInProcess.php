<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
include "BBDD_connection/connection.php";

if($_SERVER['REQUEST_METHOD'] === "POST"){
    $campos = [
        'user_name' => trim($_POST['nombre']),
        'surname' => trim($_POST['apellido']),
        'dni' => trim($_POST['dni']),
        'user_password' => trim($_POST['password']),
        'Confirmpassword' => trim($_POST['Confirmpassword']),
        'phone' => trim($_POST['telefono']),
        'email' => trim($_POST['correo']),
    ];

    // Filtrar los valores vacíos
    $campo_vacio = array_filter($campos, function ($valor) {
        return empty($valor);
    });

    // Si hay campos vacíos, devolver código de error y redirigir
    if (!empty($campo_vacio)) {
        $codError = array_key_first($campo_vacio);
        header("Location: signIn.php?codError=$codError");
        exit;
    }

    if($campos['user_password'] !== $campos['Confirmpassword']){
        header("Location: signIn.php?codError=8");
        exit;
    }

    // Comprobar si el dni ya está registrado
    $stmt = $conn->prepare("SELECT dni FROM users WHERE dni = ?");
    $stmt->bind_param("s", $campos['dni']);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        header("Location: signIn.php?codError=7");
        exit;
    }

    // Hashear la contraseña
    $campos['user_password'] = password_hash($campos['user_password'], PASSWORD_DEFAULT);

    // Preparar la consulta
    $sql = "INSERT INTO users (user_name, surname, dni, user_password, phone, email) 
        VALUES (?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    
        // Enlazamos los parámetros
        $stmt->bind_param("ssssss", 
        $campos['user_name'], 
        $campos['surname'], 
        $campos['dni'], 
        $campos['user_password'],         
        $campos['phone'], 
        $campos['email'], 
);
        // Ejecutamos la consulta
        if ($stmt->execute()) {
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
                $mail->setFrom('guayracamp@gmail.com', 'Registro GuayraCamp'); 
                $mail->addAddress($campos['email']);

                // Configuración del correo
                $mail->isHTML(true);
                $mail->Subject = 'Registro GuayraCamp';
                $mail->Body    = "<h3>¡Bienvenido a GuayraCamp!</h3>
                                <p>Gracias por registrarte en nuestra plataforma.</p>
                                <p>Recuerda que para poder reservar, tu usuario es " . $campos['email'] . "</p>
                                <p>Esperamos que disfrutes de tu estancia en nuestro camping.</p>
                                <p>Cualquier duda no dudes en contactar es clientes@guayracamp.es</p>";

                // Enviar el correo y si todo sale bien, redirigir al espacio personal
                if ($mail->send()) {
                    session_start();
                    $_SESSION['email'] = $campos['email'];
                    header("Location: personal_space.php?success");
                    exit();
                } else {
                    echo "<script>alert('Error al enviar el correo de confirmación.');</script>";
                }
                return true;
            } catch (Exception $e) {
                return false;
            }
    
        // Cerramos la conexión
        $stmt->close();
        $conn->close();
    }

}
?>