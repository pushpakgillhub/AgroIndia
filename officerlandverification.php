<?php 
include 'partials/_dbconnect.php'; 
$query = "select * from land";
$result = mysqli_query($conn,$query);
if(isset($_POST['verify'])){
  $email=$_POST['email'];
  $sql_04 = "DELETE FROM land WHERE emailid='$email'";
  if(mysqli_query($conn, $sql_04))
{
    include 'officerlandverificationmail.php';
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
    <title>Land Verification</title>
    <style>
    fieldset {}

    legend {
        font-size: 200%;
    }

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
        <h4 style="margin-top:170px" class="text-white">Mail to farmer who's land is verified and can come to office for
            documents</h4>
    </center>
    <div style="margin-left:495px">
        <form class="form-inline" action="officerlandverification.php" method="post">
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
                        <h2 class="display-6 text-center text-white">Land Details are</h2>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered text-center">
                            <tr class="bg-dark text-white">
                                <td>Farmer Email ID</td>
                                <td>Sellers Aadhar Number</td>
                                <td>Land Id</td>
                                <td>Land Area</td>
                                <td>Document verification Center</td>
                            </tr>
                            <?php

                while($row = mysqli_fetch_assoc($result))
                {
                ?>
                            <td class="text-white"><?php echo $row['emailid'] ?></td>
                            <td class="text-white"><?php echo $row['aadharofpc'] ?></td>
                            <td class="text-white"><?php echo $row['landid'] ?></td>
                            <td class="text-white"><?php echo $row['landarea'] ?></td>
                            <td class="text-white"><?php echo $row['docverficationcenter']?></td>
                            </tr>
                            <?php
                }
                ?>

                        </table>
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