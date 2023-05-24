<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

include 'partials/_dbconnect.php';


if(isset($_POST['verify'])){
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host='smtp.gmail.com';
    $mail->SMTPAuth=true;
    $mail->Username='krishanyadav3779@gmail.com';
    $mail->Password='rhscndgedwpixpmd';
    $mail->SMTPSecure='ssl';
    $mail->Port=465;

    $mail->setFrom('krishanyadav3779@gmail.com');
    $mail->addAddress($_POST["email"]);

    $mail->isHTML(true);

    $mail->Subject="Crop Verification";
    $mail->Body="Your entered crop details are verified and you can come to market started to by crop on ".$_POST["datt"];

    $mail->send();
    echo
    "
    <script>alert('Mail sent');
    document.location.href='officerverify.php';</script>
    
    ";
}
?> 