<?php
session_start();
if(!isset($_SESSION['loggedin']) ||$_SESSION ['loggedin']!=true){
    header("location: login.php");
    exit;
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
    <link rel="stylesheet" href="sty.css">
    <title>Welcome <?php $_SESSION['aadharNumber']?></title>
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
    <center>
        <hr style="height:30px;border-width:0;color:gray;background-color:blue;margin-top:150px;
    width:1200px;">
        <h4 style="color:white;margin-top:-48px;">Farmer</h4>
        <div class="cards">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text"><img src="Images/w.png" alt="Verify Logo"></p>
                            <a href="newdetails.php">New Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text"><img src="Images/w.png" alt="Verify Logo"></p>
                            <a href="viewcropdetails.php">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="margin-bottom:0px;">
            <h6><a href="/loginpage/homepage.php">LogOut</a></h6>
        </div>
    </center>

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