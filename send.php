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

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// require 'phpmailer/src/Exception.php';
// require 'phpmailer/src/PHPMailer.php';
// require 'phpmailer/src/SMTP.php';

// if(isset($_POST["send"])){
//     //POST
//     $email = $_POST['email'];
//     $name = $_POST['name'];
//     $subject = $_POST['subject'];
//     $message = $_POST['message'];

//     //PHP Mailer Declaration
//     $mail = new PHPMailer(true);

//     $mail->isSMTP();
//     $mail->Host = 'smtp.hostinger.com';
//     $mail->SMTPAuth = true;
//     $mail->Username = 'contact@dnails.shop';
//     $mail->Password = 'Nichole@15'; //Gmail App Password
//     $mail->SMTPSecure = 'tls';
//     $mail->Port = '587';

//     //SETTING Email
//     $mail->setFrom('contact@dnails.shop', 'RWS Trucking Services'); //Senders Email
//     $mail->addAddress($email); //Receivers Email
//     $mail->isHTML(true);
//     $mail->Subject = "Good Day!";
//     $mail->Body = "Thank you for your message " . $name . ", " .
//      "<br> I appreciate you taking the time to reach out to me. Please know that I have received your message, and I will do my best to respond as soon as possible. Your patience and understanding are greatly appreciated, and I look forward to getting back to you soon. Once again, thank you for your message, and have a wonderful day. Regards, RWS Trucking Services";
//     $mail->send();
//     
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_POST["send"])){
    //POST
    $sender = $_POST['email'];
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
    $mail->setFrom('contact@dnails.shop', 'RWS Trucking Service'); //Senders Email
    $mail->addAddress($sender); //Receivers Email
    $mail->isHTML(true);
    $mail->Subject = "Good Day!";
    $mail->Body = "Thank you for your message " . $name . ", " .
          " I appreciate you taking the time to reach out to me. Please know that I have received your message, and I will do my best to respond as soon as possible. Your patience and understanding are greatly appreciated, and I look forward to getting back to you soon. Once again, thank you for your message, and have a wonderful day. Regards, RWS Trucking Services";
    $mail->send();
    echo "Message Sent Successfully!";
}
?>