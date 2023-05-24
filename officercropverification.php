<?php 
include 'partials/_dbconnect.php'; 
$query = "select * from cropsell";
$queryy = "select * from bank";
$resultt = mysqli_query($conn,$queryy);
$result = mysqli_query($conn,$query);
if(isset($_POST['verify'])){
  $email=$_POST['email'];
  $sql11 = "DELETE FROM cropsell WHERE aadharNumber='$email'";
  $sql12 = "DELETE FROM bank WHERE aadharNumber='$email'";
  if(mysqli_query($conn,$sql12)){
    echo"";
  }
  
  if(mysqli_query($conn, $sql11))
{
    include 'officercropverificationmail.php';
}
else
{
    echo "ERROR: Could not able to execute $sql_04. " . mysqli_error($conn);
}
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="styless.css">
    <title>View Details</title>
    <style>
    body {

        background-image: url('https://images.wallpaperscraft.com/image/single/trail_field_sunset_332193_1024x768.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 100% 100%;

    }
    </style>
</head>

<body>
    <div class="heade">
        <img class="logo" src="Images/logo.jpg" alt="Logo">
        <p class="agidpt">ARICULTURE DEPARTMENT</p>
        <p class="skishan">समृद्ध किसान - हमारी पहचान</p>
        <img class="logo1" src="Images/logo4.png" alt="sidelogo">
        <img class="logo2" src="Images/150-years-Mahatma-Gandhi-Logo.png" alt="side-logo2">
    </div>
    <!--Middle images-->
    <div>
        <img class="slideimage" src="Images/slideimage.jpg" alt="">
    </div>
    <center>
        <h4 style="margin-top:170px" class="text-white">Mail to farmer who's date for crop sell is finalized</h4>
    </center>
    <div style="margin-left:495px">
        <form class="form-inline" action="officercropverification.php" method="post">
            <div class="form-group mb-2">
                <input type="text" class="form-control" name="email" placeholder="email@example.com">
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <label for="inputPassword2"></label>
                <input type="date" class="form-control" name="datt" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary mb-2" name="verify">Confirm Date</button>
        </form>
    </div>
    <div class="container1">
        <div class="row mt-5">
            <div class="col">
                <div class="col mt-5">
                    <div class="card-header">
                        <h2 class="display-6 text-center text-white">Crop Entered By Farmers For Sell</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <tr class="bg-dark text-white">
                                <td>Farmer Email Address</td>
                                <td>Crop Type</td>
                                <td>Crop Name</td>
                                <td>Crop Area</td>
                                <td>Owner</td>
                                <td>Owner Name</td>
                                <td>Land Coordinate</td>
                                <td>Crop Area Part</td>
                                <td>Account Number</td>
                                <td>IFSC</td>
                                <td>Account Holder Name</td>
                                <td>Bank Name</td>
                                <td>Branch Name</td>
                            </tr>
                            <tr onclick="hideRow(this)">
                                <?php

                while(($row = mysqli_fetch_assoc($result))&&($roww = mysqli_fetch_assoc($resultt)))
                {
                ?>
                                <td class="text-white"><?php echo $row['aadharNumber'] ?></td>
                                <td class="text-white"><?php echo $row['cropType'] ?></td>
                                <td class="text-white"><?php echo $row['cropName'] ?></td>
                                <td class="text-white"><?php echo $row['cropArea'] ?></td>
                                <td class="text-white"><?php echo $row['owner']?></td>
                                <td class="text-white"><?php echo $row['ownerName']?></td>
                                <td class="text-white"><?php echo $row['land']?></td>
                                <td class="text-white"><?php echo $row['careapart']?></td>
                                <td class="text-white"><?php echo $roww['accountNumber']?></td>
                                <td class="text-white"><?php echo $roww['ifsc']?></td>
                                <td class="text-white"><?php echo $roww['accholdername']?></td>
                                <td class="text-white"><?php echo $roww['bankName']?></td>
                                <td class="text-white"><?php echo $roww['branchName']?></td>
                            </tr>
                            <?php
                }
                ?>

                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html>