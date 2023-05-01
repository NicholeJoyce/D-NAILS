<?php
include 'connection.php';
session_start();


if(isset($_REQUEST['login'])) {
    $email = $_POST['mail'];
    $password = $_POST['pass'];
    $verify = 1;
    $rec = "SELECT * FROM userinfo WHERE 'Email' = '$email' AND 'Password' = '$password' AND 'verify_status' = 1";
    $result = mysqli_query($conn, $rec);

    if (is_array($row)) {

        $_SESSION['FirstName'] = $row['firstname'];
        $_SESSION['LastName'] = $row['lastname'];
    }

    if (!empty($row)){
        if($row['UserLevel'] == 1) {
            header("location: pasreg.php");
        }else if($row['UserLevel'] == 2) {
            header("location: driverreg.php");
        }else if($row['UserLevel'] == 3) {
            header("location: admin.php");
        }
    }else {
        $SESSION['status'] = "Invalid!";
        header("location: index.php");
        exit(0);
    }
}
