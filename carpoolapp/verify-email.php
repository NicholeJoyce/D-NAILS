<?php 
session_start();
include('connection.php');
if(isset($_GET['token'])){

    $token = $_GET['token'];
    $verify_query = "SELECT verify_token FROM userinfo WHERE verify_token='$token' LIMIT 1";
    $verify_query_run = mysqli_query($conn, $verify_query);

    if(mysqli_num_rows($verify_query_run) > 0){
        $row = mysqli_fetch_array($verify_query_run);
        
        if($row['verify_status'] == 0){
            $clicked_token = $row['verify_token'];
            $update_query = "UPDATE userinfo SET verify_status='1' WHERE verify_token='$clicked_token' LIMIT 1";
            $update_query_run = mysqli_query($conn, $update_query);

            if($update_query_run){
                $_SESSION['status'] = "Your Account has been verified!";
                header("Location: index.php");
                exit(0);

            }else{
                $_SESSION['status'] = "Verification Failed!";
                header("Location: index.php");
                exit(0);
            }

        }else{
            $_SESSION['status'] = "Email Already Verified!";
            header("Location: index.php");
            exit(0);
        }

    }else{
        $_SESSION['status'] = "This Token does not Exists!";
        header("Location: index.php");
    }
}else{
    $_SESSION['status'] = "Not Allowed";
    header('Location: index.php');
}

?>
