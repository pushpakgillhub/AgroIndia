<?php
session_start();
if(!isset($_SESSION['loggedin']) ||$_SESSION ['loggedin']!=true){
    header("location: login.php");
    exit;
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/_dbconnect.php';
    $email=$_POST['emailAddress'];
    $adoseller=$_POST['aadharNumber'];
    $landid=$_POST['landId'];
    $landarea=$_POST['landArea'];
    $verificationcenter=$_POST['verificationCenter'];
      $landc="SELECT landid from land where emailid='$email'";
      if($landid != $landc){
        $sql2 = "INSERT INTO `land` VALUES ('$email', '$adoseller', '$landid', '$landarea', '$verificationcenter')";
        $res=mysqli_query($conn,$sql2);
        if ($res){
          echo
          "
          <script>alert('Land Details are saved...Soon date will be appointed for documentation');
          document.location.href='welcome.php';</script>
          ";
        }
      }
      else{
        echo '<script>alert("Already Registered!!")</script>';
      }
    
  }
  
?>
<!DOCTYPE html>
<html>

<head>
    <style>
    body {
        background-image: url('https://images.wallpaperscraft.com/image/single/flowers_grass_trees_911278_1024x768.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 100% 100%;

        font-family: Arial, sans-serif;
        margin: 0;
        padding: 20px;
        background-color: #f4f4f4;
    }

    h1 {
        font-size: 24px;
        margin-bottom: 20px;
    }

    .form-container {
        max-width: 500px;
        margin: 0 auto;
        background-color: #ffffff;
        padding: 30px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    input[type="text"],
    input[type="number"] {
        width: 100%;
        padding: 10px;
        font-size: 14px;
        border-radius: 4px;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    input[type="text"]:focus,
    input[type="number"]:focus {
        outline: none;
        border-color: #80bdff;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }

    .btn {
        display: inline-block;
        font-weight: 400;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        user-select: none;
        border: 1px solid transparent;
        padding: 10px 20px;
        font-size: 16px;
        line-height: 1.5;
        border-radius: 4px;
        transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out,
            border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        background-color: #007bff;
        color: #fff;
    }

    .btn:hover {
        background-color: #0069d9;
        border-color: #0062cc;
    }
    </style>
</head>

<body>
    <div class="form-container">
        <h1>Enter Details for Land Registraion and Soil Card</h1>
        <form action="/loginpage/landregistraion.php" method="post">
            <div class="form-group">
                <label for="aadharNumber">Aadhar Number of Seller</label>
                <input type="text" id="aadharNumber" name="aadharNumber" placeholder="Enter Aadhar Number">
            </div>
            <div class="form-group">
                <label for="aadharNumber">Enter Your Email ID</label>
                <input type="email" id="emailAddress" name="emailAddress" placeholder="Your Email ID">
            </div>
            <div class="form-group">
                <label for="landId">Land ID</label>
                <input type="text" id="landId" name="landId" placeholder="Enter Land ID">
            </div>
            <div class="form-group">
                <label for="landArea">Land Area</label>
                <input type="number" id="landArea" name="landArea" placeholder="Enter Land Area (in acres)">
            </div>
            <div class="form-group">
                <label for="verificationCenter">Document Verification Center</label>
                <input type="text" id="verificationCenter" name="verificationCenter"
                    placeholder="Enter Verification Center">
            </div>
            <button type="submit" class="btn">Submit</button>
        </form>
    </div>