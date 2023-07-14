<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="POST">
        <input type="text"   name="name" id="firstname" placeholder="Enter Name" >
        <br><br>
        
        
        <input type="Email" name="emailId" id="emailid"  placeholder="Enter EmailId" ><br><br>
        
        <textarea name="textarea" id="" cols="30" rows="10"></textarea><br>
        
        <button name="send" type="submit">Submit</button>
    </form>
</body>
</html>


<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    if (isset($_POST['send'])){


        $name = $_POST['name'];

        $email = $_POST['emailId'];

        $msg = $_POST['textarea'];
    }

    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function


    //Load Composer's autoloader
    require 'php mailer/Exception.php';
    require 'php mailer/PHPMailer.php';
    require 'php mailer/SMTP.php';


    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = "hello@gmail.com";                     //SMTP username
        $mail->Password   = 'password';                               //SMTP password    
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom("hello@gmail.com");  //mail sender
        $mail->addAddress('hello@gmail.com', 'chandan ');     //It take same or different mail where you want to receive Mail
        

        //Attachments

        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments here you can give attachment
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'From Web Site ';
        $mail->Body    = "Sender Name - $name <br> Sender Email - $email <br> messge - $msg";
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

?>