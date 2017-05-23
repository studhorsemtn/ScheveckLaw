<?php
function Validate()
    {
        // Check for empty fields
        if(empty($_POST['name'])            ||
                empty($_POST['email'])      ||
                empty($_POST['phone'])      ||
                empty($_POST['message'])    ||
                !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {

                return false;
           }
        else
            return true;
    }

function SendEmail($to = 'tri.developmentstudios@gmail.com')
    {
        if(Validate() == true) {
                $name           =   $_POST['name'];
                $email_address  =   $_POST['email'];
                $phone          =   $_POST['phone'];
                $message        =   $_POST['message'];

                // Create the email and send the message
                $email_subject  =   "Website Contact Form:  $name";
                $email_body     =   "You have received a new message from your website contact form.\n\n"."Here are the
                details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
                $headers        =   "From: ScheveckLaw.com\n";
                $headers        .= "Reply-To: $email_address";
                // Send true on successful send.
                // Send false if failed
                return (mail($to,$email_subject,$email_body,$headers))? true: false;
            }
        else
            // Invalid inputs
            return 'err';
    }

    // Apply function(s). You will get true, false, or err
    $send   =   SendEmail();

    // On return, you can echo any result
    if($send == 'err')
        echo 'Invalid Fields.';
    elseif($send == false)
        echo 'An Error Occurred.';
    else
        echo 'Email Sent Successfully.';




?>
