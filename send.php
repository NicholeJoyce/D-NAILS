<?php
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;
 
// require 'PHPMailer/src/Exception.php';
// require 'PHPMailer/src/PHPMailer.php';
// require 'PHPMailer/src/SMTP.php';
 
// if(isset($_POST["send"])){
//     $name = $_POST['name'];
//     $message = "Hi, ". $name . "! This is to acknowledge your email that we have receieved it, we'll get back to you as soon as we can. Regards, RWS Trucking Services!";
    
//     $mail = new PHPMailer(true);
//     $mail->isSMTP();
//     $mail->Host = 'smtp.hostinger.com';
//     $mail->SMTPAuth = true;
//     $mail->Username = 'contact@dnails.shop';
//     $mail->Password = 'Nichole@15';
//     $mail->SMTPSecure = 'tls';
//     $mail->Port = '2525';

//     $mail->setFrom('contact@dnails.shop', 'RWS Trucking Services');
    
//     $mail->isHTML(true);
//     $email = $_POST['email'];
//     $mail->addAddress($email);
//     $mail->isHTML(true);                                                                                                     
//     $mail->Subject = $_POST['subject'];
//     $mail->Body =($message);
//     $mail->send();
//     echo "Feedback Successful!";}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_POST["send"])){
    //POST
    $email = $_POST['email'];
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    //PHP Mailer Declaration
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.hostinger.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'contact@dnails.shop';
    $mail->Password = 'Nichole@15'; //Gmail App Password
    $mail->SMTPSecure = 'tls';
    $mail->Port = '587';

    //SETTING Email
    $mail->setFrom('contact@dnails.shop', 'RWS Trucking Services'); //Senders Email
    $mail->addAddress($email); //Receivers Email
    $mail->isHTML(true);
    $mail->Subject = "Good Day!";
    $mail->Body = "Thank you for contacting us! We will get back to you as soon as we can. Have a wonderful day " . $name;
    $mail->send();
    echo "Feedback Successful!";
}
?>