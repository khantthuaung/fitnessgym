<?php 
include '../auth/connect.php';

$uname=$_POST['username'];
$phone=$_POST['phone'];
$password=$_POST['password'];
$email=$_POST['email'];
$gender=$_POST['gender'];
$height=$_POST['height'];
$weight=$_POST['weight'];
$age=$_POST['age'];
$pass=$_POST['password'];
$password=md5($pass);

$sql="INSERT INTO users(username,password,gender,mobile,email,age,created_date,modified_date) VALUES ('$uname','$password','$gender','$phone','$email','$age',now(),now())";
mysqli_query($conn, $sql);
$sql2=mysqli_query($conn, "select userid from users where email='$email'");
$row=mysqli_fetch_assoc($sql2);
$id=$row['userid'];
$sql3="insert into health_status(height,weight,uid) values('$height','$weight','$id')";
mysqli_query($conn,$sql3);

$sql4="insert into enrolls(uid,renewal) values('$id','no')";
mysqli_query($conn,$sql4);
	
	echo "<head><script>alert('Member Added ');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=../index.php'>";


 ?>