<?php
require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;


$mail->SMTPDebug = 2;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'relay-hosting.secureserver.net';  // Specify main and backup SMTP servers
$mail->SMTPAuth = false;                               // Enable SMTP authentication
$mail->Username = 'schevecklaw@gmail.com';                 // SMTP username
$mail->Password = 'Montana24';                           // SMTP password
// $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 25;                                    // TCP port to connect to

function Validate()
    {
        // Check for empty fields
        if(empty($_POST['name'])            ||
                empty($_POST['phone'])       ||
                empty($_POST['email'])        ||
                empty($_POST['message'])   ||
                !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {

                return false;
           }
        else
            return true;
    }

    $mail->setFrom(  'schevecklaw@gmail.com', $_POST['name']);
    $mail->addAddress('schevecklaw@gmail.com');     // Add a recipient
    //$mail->addAddress('studhorsemtn@gmail.com');     // Add a recipient

    $mail->addReplyTo($_POST['email'], $_POST['name']);

    $mail->Subject = 'Expungement Request';
    $mail->Body    = $_POST['message']."\n\n".$_POST['name']."\n".$_POST['phone'];


    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
      echo '<script type="text/javascript"> alert ("Thank you, your message has been sent. We will contact you within 24 hrs."); window.history.back(); </script>';
        // header('Location:form.html');
        // echo 'Message has been sent';

    }




?>
