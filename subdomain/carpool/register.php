<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
session_start();

//PHP MAILER
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
// INCLUDE
include('connection.php');

//FUNCTIONS
function sendemail_verify($FirstName,$Email,$verify_token){
     //PHP Mailer Declaration
     $mail = new PHPMailer(true);
     $mail->isSMTP();
     $mail->Host = 'smtp.hostinger.com';
     $mail->SMTPAuth = true;
     $mail->Username = 'contact@dnails.shop';
     $mail->Password = 'Nichole@15'; 
     $mail->SMTPSecure = 'tls';
     $mail->Port = '587';

     $emailbody = " <h1><b>Good Day!  ". $FirstName . "</b></h1>
     <hr>
     <h3>Thank you for registering with our carpool service! We are delighted to have you on board. To start using our service, we kindly request you to verify your account by clicking on the verification link provided.</h3>
    
     <a href='https://carpool.dnails.shop//verify.php?token=$verify_token'<button type='button' id='veributton' class='btn btn-info rounded-pill'>Verify Your Email Here!</button></a>
     <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js' integrity='sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4' crossorigin='anonymous'></script>
   
     <h4>Thank you and stay safeee!</h4>";

     //SETTING Email
    $mail->setFrom('contact@dnails.shop', 'Carpool App Registration'); //Senders Email
    $mail->addAddress($Email); //Receivers Email
    $mail->isHTML(true);
    $mail->Subject = "Carpool App Verification!" . $FirstName;
    $mail->Body = $emailbody;
    $mail->send();
   
   
}
if (isset($_POST["send"])) {
    //DECLARATION OF NAMES 
    $UserLevel = $_POST['userlevel'];
         $FirstName = $_POST['firstname'];
        $LastName= $_POST['lastname'];
        $ContactNum= $_POST['contactnumber'];
       $AccNum= $_POST['accountnumber'];
       $Email = $_POST['mail'];
       $Password = $_POST['pass'];
         $UnitNum = $_POST['unitnum'];
         $Street = $_POST['street'];
         $Municipality = $_POST['municipality'];
         $ZipCode = $_POST['zipcode'];
    $verify_token = md5(rand());


    //EMAIL EXIST OR NOT
    $check_email_query = "SELECT Email FROM userinfo WHERE Email = '$Email' LIMIT 1";
    $check_email_query_run = mysqli_query($conn, $check_email_query);

    if(mysqli_num_rows($check_email_query_run) > 0){
        $_SESSION['status'] = "The email has already been registered!";
        header("Location: index.php");
    }
    else{
        $sql = "INSERT INTO userinfo (UserLevel, FirstName , LastName , ContactNum , AccNum , Email, Password, UnitNum , Street, Municipality, ZipCode, verify_token) 
         VALUES ('$UserLevel', '$FirstName', '$LastName', '$ContactNum', '$AccNum', '$Email', '$Password', '$UnitNum' , '$Street', '$Municipality', '$ZipCode', '$verify_token')";
    
        $query_run = mysqli_query($conn, $sql);

        if($query_run){

            sendemail_verify($FirstName , $Email, $verify_token);
            $_SESSION['status'] ="Registered Successfully! You may now go to your Email for next Step!";
            header("Location: register.php");
        }else{
            $_SESSION['status'] = "Registration Failed!";
            header("Location: index.php");
        }
    
    }

    header('Location: index.php');

   
}
?>
</body>
</html>
