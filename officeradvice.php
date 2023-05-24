<?php 
include 'partials/_dbconnect.php'; 
$query = "select * from advice";
$result = mysqli_query($conn,$query);
if(isset($_POST['anss'])){
  $email=$_POST['email'];
  $sql_04 = "DELETE FROM advice WHERE emailid='$email'";
  if(mysqli_query($conn, $sql_04))
{
    include 'officeradvicemail.php';
    header("location:officerwelcome.php");
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
    <title>Officer Advice</title>
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


    <div style="margin-top:100px;">
        <fieldset>
            <legend class="text-white">Email Answers</legend>

            <form action="officeradvice.php" method="post">

                <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter email" name="email">
                </div>
                <div class="form-group col-md-4">
                    <label for="exampleInputPassword1">Answer of Query</label><br>
                    <textarea name="message" id="" cols="30" rows="5"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="anss">Answer</button>
            </form>
        </fieldset>
    </div>

    <div class="bottomwelcome" style="margin-top:400px;">
        <div class="container1">
            <div class="row mt-5">
                <div class="col">
                    <div class="col mt-5">
                        <div class="card-header">
                            <h2 class="display-6 text-center text-white">Queries Are</h2>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered text-center">
                                <tr class="bg-dark text-white">
                                    <td>Farmer Aadhar Number</td>
                                    <td>Phone Number</td>
                                    <td>Email Id</td>
                                    <td>Answer By</td>
                                    <td>Query</td>
                                </tr>
                                <tr onclick="hideRow(this)">
                                    <?php

                while($row = mysqli_fetch_assoc($result))
                {
                ?>
                                    <td class="text-white"><?php echo $row['faadharNumber'] ?></td>
                                    <td class="text-white"><?php echo $row['phoneNumber'] ?></td>
                                    <td class="text-white"><?php echo $row['emailid'] ?></td>
                                    <td class="text-white"><?php echo $row['answerby'] ?></td>
                                    <td class="text-white"><?php echo $row['problem']?></td>
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