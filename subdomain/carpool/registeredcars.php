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
    <title>Registered Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<style>
    .h1{
        font-size: 100%;
    }
    .button{
        width: 100px;
        font-family: Bruno Ace SC;

    }
</style>
</head>
<body style="background: linear-gradient(to bottom left, #B0E0E6 10%, #BD1088 100%)">

<div class="h1">
<h1 style="font-family: 'Bruno Ace SC'">Reistered Users</h1>
</div>
<hr>
    <table class="table">
        <thead>
            <tr>
               
                
                <th scope="col">Car Model</th>
                <th scope="col">Car Color</th>
                <th scope="col">Plate Number</th>
                <th scope="col">Time and Date Registered</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include('connection.php');
            $verified = "SELECT * FROM car ";
            $verified_query_run = mysqli_query($conn, $verified);
            while($data = $verified_query_run->fetch_assoc()):
            ?>
                <tr>
                    
                    <td><?php echo $data['CarModel'] ?></td>
                    <td><?php echo $data['CarColor'] ?></td>
                    <td><?php echo $data['LicensePlate'] ?></td>
                    <td><?php echo $data['TimeRegistered'] ?></td>
                </tr>
        </tbody>
    <?php endwhile; ?>
    </table>

    <div class="button">
        <center>
    <button type="submit" class="btn btn-primary" style="background-color:#161B30"><a href="index.php" >Back</a></button>
            </center>
</div>
    <hr>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>
