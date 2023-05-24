<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
  include 'partials/_dbconnect.php';
  $aadharnumber=$_POST['aadharNumber'];
  $cropType=$_POST['cropType'];
  $cropName=$_POST['cropName'];
  $cropArea=$_POST['cropArea'];
  $owner=$_POST['owner'];
  $ownerName=$_POST['ownerName'];
  $land=$_POST['land'];
  $careapart=$_POST['carea'];
  $accountNumber=$_POST['accountnumber'];
  $caccnum=$_POST['caccnum'];
  $ifsc=$_POST['ifsc'];
  $accholdername=$_POST['accholdername'];
  $bankname=$_POST['bankName'];
  $branchname=$_POST['branchName'];
    $landc="SELECT land from cropsell where aadharNumber='$aadharnumber'";
    if($land != $landc){
      $sql =  "INSERT INTO `cropsell` (`aadharNumber`, `cropType`, `cropName`, `cropArea`, `owner`, `ownerName`, `land`, `careapart`) VALUES ('$aadharnumber', '$cropType', '$cropName', '$cropArea', '$owner', '$ownerName', '$land', '$careapart')";
      $sql2 = "INSERT INTO `bank` VALUES ('$aadharnumber', '$accountNumber', '$ifsc', '$accholdername', '$bankname', '$branchname')";
      $res=mysqli_query($conn,$sql2);
      $result = mysqli_query($conn,$sql);
      if ($result && $res){
        echo
        "
        <script>alert('Crop Details for sell are saved...Soon date will be appointed');
        document.location.href='welcome.php';</script>
        ";
      }
    }
    else{
      echo '<script>alert("Already Registered!!")</script>';
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
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="sty.css">

    <title>Crop Sell</title>
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

    input[type=text],
    #owner,
    #carea {
        border: 1px solid black;
    }

    label {
        font-weight: bold;

    }

    .form-row {
        display: flex;
        flex-wrap: wrap;
        margin-right: -10px;
        margin-left: 0px;
    }

    .form-group.col-md-4 {
        flex: 0 0 33.333333%;
        max-width: 33.333333%;
        padding-right: 10px;
        padding-left: 10px;
    }

    .form-group.col-md-6 {
        flex: 0 0 50%;
        max-width: 50%;
        padding-right: 10px;
        padding-left: 10px;
    }

    .form-control:focus {
        outline: none;
        border-color: #80bdff;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }

    select.form-control {
        height: auto;
    }

    .btn-primary {
        color: #fff;
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        color: #fff;
        background-color: #0069d9;
        border-color: #0062cc;
    }

    #carea {
        width: 204%;

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
    <div style="margin-top:100px;">
        <h3 class="text-white">Enter Your Details For selling Your Crop</h3>
        <form action="/loginpage/cropsell.php" method="post">
            <div class="form-group col-md-6">
                <label for="aadharNumber">Aadhar Number</label>
                <input type="text" class="form-control" name="aadharNumber" id="aadharNumber">
            </div>
            <h3 class="text-white">Crop Details</h3>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="cropType">Crop Type</label>
                    <input type="text" class="form-control" name="cropType" id="Crop Type">
                </div>
                <div class="form-group col-md-4">
                    <label for="cropName">Crop Name</label>
                    <input type="text" class="form-control" name="cropName" id="CropName">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="cropArea">Crop Area</label>
                    <input type="text" class="form-control" name="cropArea" id="cropArea">
                </div>
                <div class="form-group col-md-4">
                    <label for="owner">Owner</label>
                    <select name="owner" id="owner" class="form-control">
                        <option value="self">Self</option>
                        <option value="relative">Relative</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="ownerName">Owner Name</label>
                    <input type="text" class="form-control" name="ownerName" id="ownerName">
                </div>
                <div class="form-group col-md-4">
                    <label for="land">Land-Id</label>
                    <input type="text" class="form-control" name="land" id="land">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="carea">Crop Area</label>
                    <select name="carea" id="carea" class="form-control">
                        <option value="full">Full</option>
                        <option value="part">Part</option>
                    </select>
                </div>

            </div>

            <h3 class="text-white">Enter Your Acccount Details</h3>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="accountnumber">Account Number</label>
                    <input type="text" class="form-control" name="accountnumber" id="accountnumber">
                </div>
                <div class="form-group col-md-4">
                    <label for="caccnum">Confirm Account Number</label>
                    <input type="password" class="form-control" name="caccnum" id="accnum">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="ifsc">IFSC Code</label>
                    <input type="text" class="form-control" name="ifsc" id="ifsc">
                </div>
                <div class="form-group col-md-4">
                    <label for="accholdername">Account Holder Name</label>
                    <input type="text" class="form-control" name="accholdername" id="accholdername">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="bankName">Bank Name</label>
                    <input type="text" class="form-control" name="bankName" id="bankName">
                </div>
                <div class="form-group col-md-4">
                    <label for="branchName">Branch Name</label>
                    <input type="text" class="form-control" name="branchName" id="branchName">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Save Details</button>


    </div>
    </form>
    </div>
    <script>
    document.getElementById("carea").selectedIndex = -1;
    document.getElementById("owner").selectedIndex = -1;
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