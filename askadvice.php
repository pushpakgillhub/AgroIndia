<?php
session_start();
if(!isset($_SESSION['loggedin']) ||$_SESSION ['loggedin']!=true){
    header("location: login.php");
    exit;
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
  if(isset($_POST['submit'])){
    include 'partials/_dbconnect.php'; 
    $phonenumber = $_POST["phonenumber"];
    $emailaddress = $_POST["emailaddress"];
    $calloremail = $_POST["calloremail"];
    $qurr = $_POST["qurr"];
    $aadharNumber=$_SESSION['aadharNumber'];

    $sql =  "INSERT INTO `advice`VALUES ('$aadharNumber', '$phonenumber', '$emailaddress', '$calloremail', '$qurr')";
    $result = mysqli_query($conn, $sql);
    if ($result){
      echo
    "
    <script>alert('Your qurey is recorded...We will get back to you soon');
    document.location.href='welcome.php';</script>
    ";
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="sty.css">
    <title>Welcome <?php echo $_SESSION['aadharNumber'];?></title>
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

    <hr style="height:30px;border-width:0;color:gray;background-color:blue;margin-top:150px;
    width:1200px;">
    <center>
        <h4 style="color:white;margin-top:-48px;">Queries Section</h4>
    </center>
    <div style="margin-left:36%">
        <form action="/loginpage/askadvice.php" method="post" style="width: 500px;">
            <div class="form-group">
                <label for="phonenumber">Phone Number</label>
                <input type="number" class="form-control" name="phonenumber" placeholder="Enter Phone Number">
                <small id="emailHelp" class="form-text text-muted">You will get a call on this number if this option is
                    selectd by you</small>
            </div>
            <div class="form-group">
                <label for="emailaddress">Email address</label>
                <input type="email" class="form-control" name="emailaddress" placeholder="Enter Email Address">
                <small id="emailHelp" class="form-text text-muted">You will get a email on this mail id if this option
                    is selectd by you</small>
            </div>
            <div class="form-group">
                <label for="calloremail">Answer By</label>
                <select id="calloremail" class="form-control" name="calloremail">
                    <option>Call</option>
                    <option>Email</option>
                </select>
            </div>
            <div class="form-group">
                <label for="calloremail">Enter your query</label><br>
                <textarea id="qurr" name="qurr" rows="4" cols="50">
  </textarea>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script>
    document.getElementById("calloremail").selectedIndex = -1;
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