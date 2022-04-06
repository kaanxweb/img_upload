
<?php
error_reporting(0);


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';
require_once '../../settings/functions.php';



$mail = new PHPMailer(true);


    if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['surname']) && !empty($_POST['phone']) && !empty($_POST['message'])){
        $name = htmlspecialchars($_POST['name']);
        $surname = htmlspecialchars($_POST['surname']);
        $email = htmlspecialchars($_POST['email']);
        $phone = htmlspecialchars($_POST['phone']);
        $message = htmlspecialchars($_POST['message']);

        try {
            //Server settings
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->CharSet = 'UTF-8';                                   //For Turkish
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = '';                //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Username   = '';              //SMTP username
            $mail->Password   = '';                  //SMTP password
            $mail->Port       = 465;                         //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`


            //Recipients
            $mail->setFrom('', 'İletişim Formu');
            $mail->addAddress('kaanxweb@hotmail.com', 'Kaan İkizler');     //Add a recipient

            //Content
            $mail->isHTML(true);  //Set email format to HTML
            $mail->Subject = 'Yeni Form';
            $mail->Body    = 'İsim:'.$name.'<br>'.
                'Soyisim:'.$surname.'<br>'.
                'Email:'.$email.'<br>'.
                'Telefon Numarası:'.$phone.'<br>'.
                'Mesaj:'.$message;
            $mail->send();
            echo data_message('success', '#');
            die();
        } catch (Exception $e) {
            echo data_message('error', '#');
            die();
            //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }


?>