

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
  <title>CarPool Registration</title>

  <style>
    .form-label {

      font-family: 'Bruno Ace SC';
      color:black;


    }
    .form-text {

font-family: 'Bruno Ace SC';


}

    .buttonsubmit {
      display: block;
      margin-left: auto;
      margin-right: auto;
      width: 300px;
      height: 300px;
      margin-top: 15px;
      font-family: 'Bruno Ace SC';
    }

    .h1 {

      font-family: 'Bruno Ace SC';
      font-weight: bold;
    }

    .login {
      font-family: 'Bruno Ace SC';
      align-items: center;
      margin-top: 20px
    }
  </style>
</head>

<body style="background: linear-gradient(to bottom left, #B0E0E6 10%, #BD1088 100%)">


  <div class="container min-vh-100 d-flex justify-content-center align-items-center">
    <form action="register.php" method="post">
      <?php
      session_start();
      if (isset($_SESSION['status'])) {
        echo "<h4>" . $_SESSION['status'] . "</h4>";
        unset($_SESSION['status']);
      }
      ?>

      <form action="register.php" method="post">
        <h1 style="font-family: 'Bruno Ace SC'">Registion For Your Account</h1>
        <!-- UserLevel -->
        <div class="mb-3">
          <label for="userlevel" class="form-label">User Type</label>
          <input type="userlevel" name="userlevel" class="form-control" id="userlevel" placeholder="Type 1 if Passenger and 2 if Driver" required>
        </div>

        <!-- First Name -->
        <div class="mb-3">
          <label for="firstname" class="form-label">First Name</label>
          <input type="firstname" name="firstname" class="form-control" id="firstname" required>
        </div>
        <!-- Last Name -->
        <div class="mb-3">
          <label for="lastname" class="form-label">Last Name</label>
          <input type="lastname" name="lastname" class="form-control" id="lastname" required>
        </div>
        <!-- Contact Number -->
        <div class="mb-3">
          <label for="contactnumber" class="form-label">Contact Number</label>
          <input type="contactnumber" name="contactnumber" class="form-control" id="contactnumber" required>

        </div>
        <!-- Account Number -->
        <div class="mb-3">
          <label for="accountnumber" class="form-label">Account Number</label>
          <input type="accountnumber" name="accountnumber" class="form-control" id="accountnumber" required>

        </div>


        <!-- Email Add -->
        <div class="mb-3">
          <label for="mail" class="form-label">Email address</label>
          <input type="email" name="mail" class="form-control" id="mail" aria-describedby="emailHelp" required>
          <div id="emailHelp" class="form-text" style="color:black">We'll never share your email with anyone else.</div>
        </div>
        <!-- password -->
        <div class="mb-3">
          <label for="pass" class="form-label">Password</label>
          <input type="password" name="pass" class="form-control" id="pass" required>
        </div>
        <!-- unit number of house of room -->
        <div class="mb-3">
          <label for="unitnum" class="form-label">Home Unit Number</label>
          <input type="unitnum" name="unitnum" class="form-control" id="unitnum" required>

        </div>
        <!-- Street -->
        <div class="mb-3">
          <label for="street" class="form-label">Street</label>
          <input type="street" name="street" class="form-control" id="street" required>

        </div>
        <!-- Municipality -->
        <div class="mb-3">
          <label for="municipality" class="form-label">Municipality</label>
          <input type="municipality" name="municipality" class="form-control" id="municipality" required>

        </div>
        <!-- ZipCode -->
        <div class="mb-3">
          <label for="zipcode" class="form-label">Zip Code</label>
          <input type="zipcode" name="zipcode" class="form-control" id="zipcode" required>

          <div class="login">
            <center>
              <p>Already have an Account? <a href=index.php style="color:black">Log In Here</a></p>
            </center>
          </div>

        </div>
        <div class="buttonsubmit">
          <center><button type="submit" name="submit" class="btn btn-primary" style="background-color:#161B30">Submit</button></center>
        </div>

      
      </form>

  </div>


</body>

</html>