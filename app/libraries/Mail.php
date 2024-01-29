<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mail
{

    public function verifyMail($recipient_mail,$recipient_name,$token)
    {
        // Load Composer's autoloader
        require '../vendor/autoload.php';

        try {

            // Instantiation and passing `true` enables exceptions
            $mail = new PHPMailer(true);

            //Server settings
            $mail->SMTPDebug = false;// Enable verbose debug output
            $mail->isSMTP(); // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';// Set the SMTP server to send through
            $mail->SMTPAuth   = true;// Enable SMTP authentication
            $mail->Username   = '****';// SMTP username
            $mail->Password   = '**********';// SMTP password
            $mail->SMTPSecure = 'tls';// Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;// TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('test.ivhub@gmail.com', 'Cash Flow');  
            $mail->addAddress($recipient_mail,$recipient_name);     // Add a recipient

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Verify Mail';
            $mail->Body    = "<b> <a href='$token' target='_blank'> Click here </a></b> to verify your registration.";
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $success = $mail->send();
            //echo 'Message has been sent';
        } catch (Exception $e) {
            //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

    }

}




?>