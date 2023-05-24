<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

include 'partials/_dbconnect.php';


if(isset($_POST['send'])){
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host='smtp.gmail.com';
    $mail->SMTPAuth=true;
    $mail->Username='krishanyadav3779@gmail.com';
    $mail->Password='rhscndgedwpixpmd';
    $mail->SMTPSecure='ssl';
    $mail->Port=465;

    $mail->setFrom('krishanyadav3779@gmail.com');
    $mail->addAddress($_POST["inputAdhar"]);

    $mail->isHTML(true);

    $mail->Subject="New Details Entered by you for your crop year ".$_POST["inputYear"];
    $mail->Body="Details Entered by you are:". "<br>"."Crop Name: ".$_POST["inputCrop"]."<br>"."\nSeeed Name: ".$_POST["inputSeedName"]."<br>"."\nCrop Year: ".$_POST["inputYear"]."<br>"."\nCrop Month: ".$_POST["inputMonth"]."<br>"."\nShowing Date: ".$_POST["inputSowingDate"]."<br>"."\nHarvesting Date:".$_POST["inputHarvestingDate"]."<br>"."\nWatering Date:".$_POST["inputWatering"]."<br>"."\nCrop Type:".$_POST["inputCropType"]."<br>"."\nFertilizers:".$_POST["inputFertilizers"]."<br>"."\nCrop Yeild:".$_POST["inputYeild"]."<br>"."\nInvestment:".$_POST["inputInvetment"]."<br>"."\nIncome:".$_POST["inputIncome"]."<br>"."\nLand ID:".$_POST["inputLandId"]."<br>"."\n\nThanks";

    $mail->send();
    echo
    "
    <script>alert('Crop Details saved successfully and a mail is sent');
    document.location.href='cropdetails.php';</script>
    ";
}
?> 