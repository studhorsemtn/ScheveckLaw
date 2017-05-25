<?php
require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;


//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'studhorsemtn@gmail.com';                 // SMTP username
$mail->Password = 'SonjaGirl0401';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

function Validate()
    {
        // Check for empty fields
        if(empty($_POST['name'])            ||
                empty($_POST['surname'])   ||
                empty($_POST['email'])        ||
                empty($_POST['message'])   ||
                !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {

                return false;
           }
        else
            return true;
    }

    $mail->setFrom( 'lyscheve@gmail.com', 'Lydon Scheveck', $auto = false);
    $mail->addAddress('bryon.elvbakken@gmail.com');     // Add a recipient

    $mail->addReplyTo($_POST['email'], $_POST['name']);

    $mail->Subject = 'Expungement Request';
    $mail->Body    = $_POST['message'];


    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }




?>
