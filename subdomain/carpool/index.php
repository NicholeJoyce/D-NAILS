<?php
session_start();
include('connection.php');


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
    .centerpic {
  display: block;
  margin-left: auto;
  margin-right: auto;
  margin-top: 50px;
  width: 350px;
  height: 350px;

}

.centerbutton {
    display: block;
  margin-left: auto;
  margin-right: auto;
  width: 300px;
  height: 300px;
    margin-top: 15px;
    font-family: 'Bruno Ace SC';
   
    
}

.title{
    
    font-family: 'Bruno Ace SC';
    font-weight: bold;
    align-items: center;
    
    
}

.form-label{

    font-family: 'Bruno Ace SC';
    font-weight: bold;
  
 

}

.reg{
    font-family: 'Bruno Ace SC';
    align-items: center;
    margin-top: 20px

}

</style>
</head>

<body style="background: linear-gradient(to bottom left, #B0E0E6 10%, #BD1088 100%)">

<div class="title">
<center><h1 style="font-size:350%">Ride Along Rendezvous</h1></center>
</div>

<img src="carpoollogo.png" class="centerpic">
<div class="container min-vh-100 d-flex justify-content-center ">

<form action="login.php" method="post">
  <div class="mb-6">
    <label for="email" class="form-label" style="font-size:105%">Email address: </label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
   
  </div>
  <div class="mb-6">
    <label for="password" class="form-label" style="font-size:105%">Password: </label>
    <input type="password" class="form-control" name="password" id="password">
  </div>

  <div class="reg">
    <p>If you don't have an account yet: <a href=userreg.php style="color:black">Create an Account Here</a></p>
  </div>
  <div class ="centerbutton">
  <center><button type="submit" name="login" class="btn btn-primary" style="background-color:#161B30">Log In</button></center>
  </div>
</form>
</div>
    
</body>
</html>