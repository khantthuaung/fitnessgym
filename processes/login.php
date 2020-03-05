<?php 
include '../auth/connect.php';
session_start();
$email=$_POST['email'];
$pass=$_POST['password'];
$password=md5($pass);
//fetch from database

$sql="select * from users where email='$email'";
$result=mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);
if ($password==$row['password']) {
	$_SESSION['user']=$row['userid'];
	echo "<head><script>alert('Login Success');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=../index.php'>";
}
else{
	echo "<head><script>alert('Login Failed.Tray Again!');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=../login.php'>";
}



 ?>