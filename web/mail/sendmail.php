<?php
include ("../mail/phpmailer/src/Exception.php");
include ("../mail/phpmailer/src/PHPMailer.php");
include ("../mail/phpmailer/src/SMTP.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mailer
{
    public function guimail($subject, $body, $email)
    {
        $mail = new PHPMailer(true);
        $mail->CharSet = "UTF-8";
        // print_r($mail);
        try {
            //Server settings
            $mail->SMTPDebug = 0;                      //Enable verbose debug output SMTP::DEBUG_SERVER
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   //Enable SMTP authentication
            $mail->Username = 'routinevietnam2@gmail.com';            //SMTP username
            $mail->Password = 'yrmdoiehnzeitxrl';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('routinevietnam2@gmail.com', 'Routine Việt Nam');
            $mail->addAddress($email);     //Add a recipient
            // $mail->addAddress('ellen@example.com');   //Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            $mail->addCC('routinevietnam2@gmail.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body = $body;
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            // echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}

?>