<?php

require '.\vendor\autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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
    $mail->setFrom('ismchaves03@gmail.com', 'Mailer');
    $mail->addAddress('ismalch887@gmail.com', 'Sami'); // Add a recipient

    // Content
    $mail->isHTML(true);                              // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body in <b>bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>