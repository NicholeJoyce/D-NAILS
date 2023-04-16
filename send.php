<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
 
if(isset($_POST["send"])){
    $name = $_POST['name'];
    $message = "Hi, ". $name . "! This is to acknowledge your email that we have receieved it, we'll get back to you as soon as we can. Regards, RWS Trucking Services!";
    
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = "smtp.hostinger.com";
    $mail->SMTPAuth = 'true';
    $mail->Username = "contact@dnails.shop";
    $mail->Password = "Nichole@15";
    $mail->SMTPSecure = "tls";
    $mail->Port = '587';

    $mail->setFrom('contact@dnails.shop', 'RWS Trucking Services');
    
    $mail->isHTML(true);
    $email = $_POST['email'];
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject = $_POST["subject"];
    $mail->Body =($message);
    $mail->send();
    echo "Feedback Successful!";}
?>