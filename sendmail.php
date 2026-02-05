<?php
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendMail($recipient, $subject, $body) {
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();

        $mail->Host     = $_ENV['SMTP_HOST'];
        $mail->Username = $_ENV['SMTP_USER'];
        $mail->Password = $_ENV['SMTP_PASS'];
        $mail->Port     = $_ENV['SMTP_PORT'];
        $mail->SMTPAuth   = true;



        

        
        // $mail->Host       = 'smtp.gmail.com';
        // $mail->Username   = 'cse_0182220012101050@lus.ac.bd';
        // $mail->Password   = '';
        
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        // $mail->Port       = 587;


        $mail->setFrom($_ENV['SMTP_USER'], 'Md. Mahmudul Hasan Arif');
        $mail->addReplyTo('cse_0182220012101050@lus.ac.bd', 'Md. Mahmudul Hasan Arif');


        
        // $mail->setFrom('cse_0182220012101050@lus.ac.bd', 'Md. Mahmudul Hasan Arif');
        $mail->addAddress($recipient);

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $body;
        $mail->AltBody = strip_tags($body);

        $mail->send();
        return true;
    } catch (Exception $e) {
        return "Mailer Error: {$mail->ErrorInfo}";
    }
}

?>
