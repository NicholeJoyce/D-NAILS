<?php
include ('connection.php');
session_start();



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
        .forms{
            font-family: 'Bruno Ace SC';
      align-items: center;
      margin-top: 20px
        }
    </style>
</head>
<body style="background: linear-gradient(to bottom left, #B0E0E6 10%, #BD1088 100%)">

    
<div class="container min-vh-100 d-flex justify-content-center">
<form class="forms">
    <h1>More Information Needed for Passenger</h1>
  <div class="mb-3">
    <label for="idtype" class="form-label">ID Type</label>
    <input type="text" class="form-control" name="idtype" id="idtype">
    
  </div>
  <div class="mb-3">
    <label for="validid" class="form-label">Valid ID</label>
    <input type="text" class="form-control" name="validid" id="validid">
  </div>
  
  <center><button type="submit" class="btn btn-primary" style="background-color:#161B30">Submit</button></center>
</form>
</div>
</body>
</html>