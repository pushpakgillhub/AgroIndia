<?php
session_start();
if(!isset($_SESSION['loggedin']) ||$_SESSION ['loggedin']!=true){
    header("location: login.php");
    exit;
}
$aadh = $_SESSION['aadharNumber'];
include 'partials/_dbconnect.php'; 
$query = "select * from newdetails where aadharNumber = '$aadh'";
$queryy = "select namee from farmer_login where aadharNumber= '$aadh' ";
$resultt = mysqli_query($conn,$queryy);
$result = mysqli_query($conn,$query);
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

        background-image: url('https://images.wallpaperscraft.com/image/single/hills_mountains_forest_320601_1024x768.jpg');
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
    <div class="bottomwelcome">
        <div class="container1">
            <div class="row mt-5">
                <div class="col">
                    <div class="col mt-5">
                        <div class="card-header">
                            <h2 class="display-6 text-center bg-dark text-white">Your Crop Details are</h2>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered text-center">
                                <tr class="bg-dark text-white">
                                    <td>Crop Name</td>
                                    <td>Seed Name</td>
                                    <td>Crop Year</td>
                                    <td>Crop Month</td>
                                    <td>Showing Date</td>
                                    <td>Harvesting Date</td>
                                    <td>Watering Number</td>
                                    <td>Crop Type</td>
                                    <td>Fertilizers</td>
                                    <td>Crop Yeild</td>
                                    <td>Investment</td>
                                    <td>Income</td>
                                    <td>Land ID</td>
                                </tr>
                                <tr class="text-white">
                                    <?php

                while($row = mysqli_fetch_assoc($result))
                {
                ?>
                                    <td class="text-white"><?php echo $row['cropName'] ?></td>
                                    <td class="text-white"><?php echo $row['seedName'] ?></td>
                                    <td class="text-white"><?php echo $row['cropYear'] ?></td>
                                    <td class="text-white"><?php echo $row['cropMonth'] ?></td>
                                    <td class="text-white"><?php echo $row['showingDate'] ?></td>
                                    <td class="text-white"><?php echo $row['harvestingDate'] ?></td>
                                    <td class="text-white"><?php echo $row['wateringNumber'] ?></td>
                                    <td class="text-white"><?php echo $row['cropType'] ?></td>
                                    <td class="text-white"><?php echo $row['fertilizers'] ?></td>
                                    <td class="text-white"><?php echo $row['cropYeild'] ?></td>
                                    <td class="text-white"><?php echo $row['investment'] ?></td>
                                    <td class="text-white"><?php echo $row['income'] ?></td>
                                    <td class="text-white"><?php echo $row['landid'] ?></td>

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