<?php
session_start();

require '..\composer\vendor\autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$token = bin2hex(random_bytes(16));
$_SESSION['token'] = $token;
$correo= $_POST['email'];
$_SESSION['email'] = $_POST['email'];

    $mail = new PHPMailer(TRUE);
    try {
        //Server settings
        $mail->SMTPDebug=0;
        $mail->isSMTP();                                  // Set mailer to use SMTP
        $mail->Host       = 'smtp.gmail.com';           // Specify main SMTP server
        $mail->SMTPAuth   = true;                         // Enable SMTP authentication
        $mail->Username   = 'ismchaves03@gmail.com';     // SMTP username
        $mail->Password   = 'cijvcypxohlajfoo';        // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption, `PHPMailer::ENCRYPTION_SMTPS` for SSL
        $mail->Port       = 587;                          // TCP port to connect to
    
        //Recipients
        $mail->setFrom('ismchaves03@gmail.com', 'Ismael Chaves');
        $mail->addAddress($correo, 'Usuario'); // Add a recipient
    
        // Content
        $mail->isHTML(true);                              // Set email format to HTML
        $mail->Subject = 'Activacion de cuenta';
        $mail->Body    = "Te has registrado, activa tu cuenta <a href='http://localhost/Parcial2/Api2/activar.php?token=$token'>aca</a>";
        $mail->AltBody = 'Te has registrado, activa tu cuenta aca';
    
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
?>