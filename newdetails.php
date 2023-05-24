<?php
$showAlert = false;
$showError = false;
if(isset($_POST['send'])){
    include 'partials/_dbconnect.php'; 
    $aadharNumber = $_POST["inputPassword"];
    $cropName=$_POST["inputCrop"];
    $seedName=$_POST["inputSeedName"];
    $cropYear=$_POST["inputYear"];
    $cropMonth=$_POST["inputMonth"];
    $showingDate=$_POST["inputSowingDate"];
    $harvestingDate=$_POST["inputHarvestingDate"];
    $wateringNumber=$_POST["inputWatering"];
    $cropType=$_POST["inputCropType"];
    $fertilizers=$_POST["inputFertilizers"];
    $cropYeild=$_POST["inputYeild"];
    $investment=$_POST["inputInvetment"];
    $income=$_POST["inputIncome"];
    $landid=$_POST["inputLandId"];
    $existSql = "SELECT * FROM `newdetails` WHERE landid = '$landid' and cropYear = '$cropYear' and cropType = '$cropType'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
       echo '<script> alert("These Details already exists"); </script>';
    }
    else{
              $sql =  "INSERT INTO `newdetails` (`aadharNumber`, `cropName`, `seedName`, `cropYear`, `cropMonth`, `showingDate`, `harvestingDate`, `wateringNumber`, `cropType`, `fertilizers`,`cropYeild`,`investment`,`income`,`landid`) VALUES ('$aadharNumber', '$cropName', '$seedName', '$cropYear', '$cropMonth', '$showingDate', '$harvestingDate', '$wateringNumber', '$cropType', '$fertilizers','$cropYeild','$investment','$income','$landid')";
              $result = mysqli_query($conn, $sql);
              if ($result){
                include 'newdetailsmail.php';
              }
        else{
            echo '<script>alert("Details not entered")</script>';
    }
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="sty.css">
    <link rel="stylesheet" href="style.css">
    <title>New Details</title>
    <style>
    body {

        background-image: url('https://images.wallpaperscraft.com/image/single/hills_mountains_forest_320601_1024x768.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 100% 100%;

    }

    label {
        color: white;
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
    <!-- <?php require 'partials/_nav.php'?> -->
    <?php
    if($showAlert){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your account is now created and you can login
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    ?>
    <div class="nwform" style="margin-left:240px;">
        <form action="/loginpage/newdetails.php" method="post">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="inputAdhar">Email</label>
                    <input type="email" class="form-control" id="inputAdhar" placeholder="email@example.com"
                        name="inputAdhar">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputCrop">Crop Name</label>
                    <input type="text" class="form-control" id="inputCrop" placeholder="e.g:rice.." name="inputCrop">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputSeedName">Seed Name</label>
                    <input type="text" class="form-control" id="inputSeedName" placeholder="e.g:BH010"
                        name="inputSeedName">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputLandId">Land ID</label>
                    <input type="text" class="form-control" id="inputLandId" placeholder="e.g:LDNI12"
                        name="inputLandId" />
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="inputYear">Crop Year</label>
                    <input type="text" class="form-control" id="inputYear" name="inputYear" />
                </div>
                <div class="form-group col-md-2">
                    <label for="inputMonth">Crop Month</label>
                    <input type="text" class="form-control" id="inputMonth" name="inputMonth">
                </div>
                <div class="form-group col-md-2">
                    <label for="inputSowingDate">Sowing Date</label>
                    <input type="date" class="form-control" id="inputSowingDate" name="inputSowingDate">
                </div>
                <div class="form-group col-md-2">
                    <label for="inputHarvestingDate">Harvesting Date</label>
                    <input type="date" class="form-control" id="inputHarvestingDate" name="inputHarvestingDate">
                </div>
                <div class="form-group col-md-2">
                    <label for="inputWatering">Watering Number</label>
                    <input type="number" class="form-control" id="inputWatering" name="inputWatering"
                        placeholder="e.g:2">
                </div>
                <div class="form-group col-md-2">
                    <label for="inputCropType">Crop Type</label>
                    <select id="inputCropType" class="form-control" name="inputCropType">
                        <option>Rabbi</option>
                        <option>Kharif</option>
                    </select>
                </div>

            </div>
            <div class="form-group">
                <label for="inputFertilizers">Fertilizers Used</label>
                <input type="text" class="form-control" id="inputFertilizers" placeholder="e.g:Urea,DAP"
                    name="inputFertilizers">
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="Crop Area">Crop Area</label>
                    <input type="text" class="form-control" id="cropArea" name="cropArea" placeholder="e.g:2.4arc">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputYeild">Crop Yeild</label>
                    <input type="text" class="form-control" id="inputYeild" name="inputYeild" placeholder="e.g:2.2tone">
                </div>
                <div class="form-group col-md-2">
                    <label for="inputInvestment">Total Investment</label>
                    <input type="number" class="form-control" id="inputInvetment" name="inputInvetment"
                        placeholder="e.g:1000">
                </div>
                <div class="form-group col-md-2">
                    <label for="inputInvestment">Total Income</label>
                    <input type="number" class="form-control" id="inputIncome" name="inputIncome"
                        placeholder="e.g:10000">
                </div>

            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputPassword">Aadhar Number</label>
                    <input type="text" class="form-control" id="inputPassword" name="inputPassword"
                        placeholder="12xxxxxxxx34">
                </div>
            </div>
            <button type="submit" class="btn btn-primary" onclick="showalert()" name="send">Save Details</button>
        </form>
    </div>
    <script>
    document.getElementById("inputCrop").selectedIndex = -1;
    document.getElementById("inputYear").selectedIndex = -1;
    document.getElementById("inputMonth").selectedIndex = -1;
    document.getElementById("inputCropType").selectedIndex = -1;
    </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>