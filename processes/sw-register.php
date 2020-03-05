<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'shwynebarbarservice@gmail.com';
    $mail->Password = 'shwyne@2019';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->setFrom('shwynebarbarservice@gmail.com', 'Shwyne Barber Serivce');


session_start();
include('auth/configs.php');
$username=$_POST['username'];
$password=$_POST['password'];
$password2=$_POST['c-password'];
$email=$_POST['email'];
$address=$_POST['address'];
$phone=$_POST['phone'];
$profile  = $_FILES['profile']['name'];
$tmp = $_FILES['profile']['tmp_name'];
$_SESSION['email']=$email;

$sql="SELECT * FROM accounts WHERE email='$email'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);

if ($profile) {
     move_uploaded_file($tmp, "userprofiles/$profile"); 
}

if ($row>=1)
{

echo "<script>alert('Email already exist.')</script>";
	
}
else
{
	$pass=md5($password);
   
$sql2="INSERT INTO accounts (name,pass,email,address,phone,photo,created_date,modified_date) VALUES('$username','$pass','$email','$address','$phone','$profile',now(),now())";

mysqli_query($conn,$sql2);
$code=rand(1000,9999);
$subject="Email Confirmation code.";

$body=$code;

$sql="INSERT INTO confirmations (email,code,created_date) VALUES ('$email','$code',now())";
mysqli_query($conn,$sql);

$mail->addAddress($email, '');
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    =$body;
    $mail->send();
    echo "<script>$(document).ajaxSuccess(function(){
    alert('We have sent a verification to '$email'');
});</script>";
    header("location:confirmation.php");
    
}


?>