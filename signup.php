<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/_dbconnect.php'; 
    $aadharNumber = $_POST["aadharNumber"];
    $namee=$_POST["namee"];
    $emailAddress=$_POST["emailAddress"];
    $phoneNumber=$_POST["phoneNumber"];
    $vilBlock=$_POST["vilBlock"];
    $distt=$_POST["distt"];
    $state=$_POST["state"];
    $password=$_POST["password"];
    $ConfirmPassword=$_POST["ConfirmPassword"];
    $existSql = "SELECT * FROM `farmer_login` WHERE aadharNumber = '$aadharNumber'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
        $showError = "Username Already Exists";
    }
    else{
        if(($password == $ConfirmPassword)){
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql =  "INSERT INTO `farmer_login` (`aadharNumber`, `namee`, `emailAddress`, `phoneNumber`, `vilBlock`, `distt`, `state`, `password`, `cpassword`, `dt`) VALUES ('$aadharNumber', '$namee', '$emailAddress', '$phoneNumber', '$vilBlock', '$distt', '$state', '$password', '$ConfirmPassword', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            
            if ($result){
                
                $showAlert = true;
            }
        }
        else{
            $showError = "Passwords do not match";
        }
    }

}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SignUp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
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


    <div class="container">
        <h3>Enter the following details to SignUp</h3>
        <form action="/loginpage/signup.php" method="post">

            <div class="mb-3">
                <label for="aadharNumber" class="form-label">Aadhar Number</label>
                <input type="text" maxlength="12" class="form-control" id="aadharNumber" name="aadharNumber">
            </div>
            <div class="mb-3">
                <label for="namee" class="form-label">Name</label>
                <input type="text" maxlength="50" class="form-control" id="namee" name="namee">
            </div>
            <div class="mb-3">
                <label for="emailAddress">Email address</label>
                <input type="email" maxlength="50" class="form-control" id="emailAddress" name="emailAddress"
                    aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="phoneNumber" class="form-label">Phone Number</label>
                <input type="text" maxlength="10" class="form-control" id="phoneNumber" name="phoneNumber">
            </div>
            <div class="mb-3">
                <label for="vilBlock" class="form-label">Village And Block</label>
                <input type="text" maxlength="50" class="form-control" id="vilBlock" name="vilBlock">
            </div>
            <div class="mb-3">
                <label for="distt" class="form-label">District</label>
                <input type="text" maxlength="50" class="form-control" id="distt" name="distt">
            </div>
            <div class="mb-3">
                <label for="state" class="form-label">State</label>
                <input type="text" maxlength="50" class="form-control" id="state" name="state">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" maxlength="50" minlength="12" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
                <label for="ConfirmPassword" class="form-label">Confirm Password</label>
                <input type="password" maxlength="50" minlength="12" class="form-control" id="confirmPassword"
                    name="ConfirmPassword">
            </div>
            <button type="submit" class="btn btn-primary" onclick=func()>Sign Up</button>
        </form>
        <script>
        function func() {
            alert("Account Created Successfully.....You can login now!!");
        }
        </script>
        <h6>Already have a account? <a href="login.php">Click here for login</a></h6>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>