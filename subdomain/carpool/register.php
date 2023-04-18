
<?php


include 'connection.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){

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
       
    
    // Checks the Email 
    $sql = "SELECT * FROM userinfo WHERE Email='$Email'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        echo "Email Already Exists!";
        return;
    }

    // Prepared Statement & Binding (Avoid SQL Injections)
    $stmnt = $conn->prepare("INSERT INTO userinfo (UserLevel, FirstName , LastName , ContactNum , AccNum , Email, Password, UnitNum , Street, Municipality, ZipCode)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmnt->bind_param('sssssssssss', $UserLevel, $FirstName, $LastName, $ContactNum, $AccNum, $Email, $Password, $UnitNum, $Street, $Municipality, $ZipCode);
    $stmnt->execute();
    $stmnt->close();
    $conn->close();

    // Mailling Part
    $name = $FirstName . " " . $LastName;
    $subject = "User Registration";
    $link ="https://carpool.dnails.shop/register.php?user=" . $email . "";
   
    $message = ' 
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <p> Hi, <strong>' . $name . '!</strong></p>
        <p> Congrats! You are done with step one which is filling out the needed information. Now that you are here, this is the last step for you registration which is to verify you email address. 
        <br>
            <a href="' . $link . '"> Verify Your Email Here </a>
            
            <br>
            <b>Carpool </b>
        </p>
    </body>
    </html>
    ';

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.hostinger.com';
    $mail->SMTPAuth = 'true';
    $mail->Username = 'contacts@dnails.shop';
    $mail->Password = 'Nichole@15';
    $mail->SMTPSecure = 'tls';
    $mail->Port = '587';

    $mail->setFrom('contacts@dnails.shop', 'Carpool App');
    $mail->addAddress($Email);
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $message;
    $mail->send();

    echo "Go to your email for step 2";

}

// session_start();
// //PHP MAILER
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// require 'phpmailer/src/Exception.php';
// require 'phpmailer/src/PHPMailer.php';
// require 'phpmailer/src/SMTP.php';
// // INCLUDE
// include('connection.php');

// //FUNCTIONS
// function sendemail_verify($FirstName,$mail,$verify_token){
//      //PHP Mailer Declaration
//      $mail = new PHPMailer(true);

//      $mail->isSMTP();
//      $mail->Host = 'smtp.gmail.com';
//      $mail->SMTPAuth = true;
//      $mail->Username = 'nicholejoycesantos1122@gmail.com';
//      $mail->Password = 'ljkmfhktkcurffgk'; //Gmail App Password
//      $mail->SMTPSecure = 'ssl';
//      $mail->Port = '465';
 
//      $mailtemplate = " <h1><b>WELCOME!  ". $FirstName . "</b></h1>
//      <h3>You have Registered to the Car Pooling Registration</h3> 
//      <h3>Verify your email address to Login with the below given links</h3>
//      <hr>
//      <a href='https://carpoolingapp/verify-email.php?token=$verify_token'<button type='button' id='veributton' class='btn btn-info rounded-pill'>Verify Now!</button></a>
//      <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js' integrity='sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4' crossorigin='anonymous'></script>
//      <hr>
//      <h4>Thank you and Let's RIDE!</h4>";
 
//      //SETTING Email
//      $mail->setFrom('email@buenaroa.store', 'Carpool Verification'); //Senders Email
//      $mail->addAddress($mail); //Receivers Email
//      $mail->isHTML(true);
//      $mail->Subject = "User Registration";
//      $mail->Body = $mailtemplate;
//      $mail->send();
 
   
// }
// if (isset($_POST["send"])) {
//     //DECLARATION OF NAMES 
//     $UserLevel = $_POST['userlevel'];
//     $FirstName = $_POST['firstname'];
//     $LastName= $_POST['lastname'];
//     $ContactNum= $_POST['contactnumber'];
//     $AccNum= $_POST['accountnumber'];
//     $Email = $_POST['mail'];
//     $Password = $_POST['pass'];
//     $UnitNum = $_POST['unitnum'];
//     $Street = $_POST['street'];
//     $Municipality = $_POST['municipality'];
//     $ZipCode = $_POST['zipcode'];
//     $verify_token = md5(rand());

//     //EMAIL EXIST OR NOT
//     $check_email_query = "SELECT Email FROM userinfo WHERE Email = '$Email' LIMIT 1";
//     $check_email_query_run = mysqli_query($conn, $check_email_query);

//     if(mysqli_num_rows($check_email_query_run) > 0){
//         $_SESSION['status'] = "Email already exists!";
//         header("Location: index.php");
//     }
//     else{
//         $sql = "INSERT INTO userinfo (UserLevel, FirstName , LastName , ContactNum , AccNum , Email, Password, UnitNum , Street, Municipality, ZipCode, verify_token) 
//         VALUES ('$UserLevel', '$FirstName', '$LastName', '$ContactNum', '$AccNum', '$Email', '$Password', '$UnitNum' , '$Street', '$Municipality', '$ZipCode', '$verify_token')";
    
//         $query_run = mysqli_query($conn, $sql);

//         if($query_run){

//             sendemail_verify("$FirstName" , "$Email", "$verify_token");
//             $_SESSION['status'] ="Registration Successful! Please Verify in Email!";
//             header("Location: register.php");
//         }else{
//             $_SESSION['status'] = "Registration Failed!";
//             header("Location: index.php");
//         }
    
//     }

   
//     header('Location: index.php');

   
// }
?>
