<?php
include('connection.php');
session_start();

if (isset($_POST["send"])) {
    //DECLARATION OF NAMES 
    
    $carmodel = $_POST['carmodel'];
    $carcolor = $_POST['carcolor'];
    $licenseplate = $_POST['licenseplate'];
    


    //EMAIL EXIST OR NOT
    $check_plate_query = "SELECT LicensePlate FROM car WHERE LicensePlate = '$licenseplate' LIMIT 1";
    $check_plate_query_run = mysqli_query($conn, $check_plate_query);

    if (mysqli_num_rows($check_plate_query_run) > 0) {
        $_SESSION['status'] = "The Car has already been registered!";
        header("Location: index.php");
    } else {
        $sql = "INSERT INTO car (CarModel,  CarColor , LicensePlate) 
         VALUES ('$carmodel', '$carcolor', '$licenseplate')";

        $query_run = mysqli_query($conn, $sql);

        if ($query_run) {

            sendemail_verify($licenseplate, $Email, $verify_token);
            $_SESSION['status'] = "Registered Successfully! You may now go to your Email for next Step!";
            header("Location: registeredcars.php");
        } else {
            $_SESSION['status'] = "Registration Failed!";
            header("Location: car.php");
        }
    }

    header('Location: car.php');
}
?>

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bruno+Ace+SC&family=Dancing+Script:wght@700&family=Oswald&family=Pacifico&family=Shalimar&family=Sigmar&family=Varela+Round&family=Xanh+Mono:ital@1&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .forms {
            font-family: 'Bruno Ace SC';
            align-items: center;
            margin-top: 20px
        }
    </style>
</head>

<body style="background: linear-gradient(to bottom left, #B0E0E6 10%, #BD1088 100%)">


    <div class="container min-vh-100 d-flex justify-content-center">
        <form class="forms">
            <h1>Car Registration</h1>
            <div class="mb-3">
                <label for="dname" class="form-label">Driver's Name</label>
                <input type="text" class="form-control" name="dname" id="dname">

            </div>
            <div class="mb-3">
                <label for="carmodel" class="form-label">Car Model</label>
                <input type="text" class="form-control" name="carmodel" id="carmodel">
            </div>

            <div class="mb-3">
                <label for="carcolor" class="form-label">Car Color</label>
                <input type="text" class="form-control" name="carcolor" id="carcolor">
            </div>

            <div class="mb-3">
                <label for="licenseplate" class="form-label">Plate Number</label>
                <input type="text" class="form-control" name="licenseplate" id="licenseplate">
            </div>

            <center><button type="submit" class="btn btn-primary" style="background-color:#161B30">Submit</button></center>
        </form>
    </div>
</body>

</html>