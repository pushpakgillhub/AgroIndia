<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

include 'partials/_dbconnect.php';


if(isset($_POST['anss'])){
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

    $mail->Subject="Answer of the query that you asked ";
    $mail->Body=$_POST["message"];

    $mail->send();
    echo
    "
    <script>alert('Mail sent');
    document.location.href='officerverify.php';</script>
    ";
}
?> 