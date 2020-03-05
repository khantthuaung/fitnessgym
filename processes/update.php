<?php 
include '../auth/connect.php';

$id=$_POST['id'];
$name=$_POST['username'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$age=$_POST['age'];
$height=$_POST['height'];
$weight=$_POST['weight'];
$profile  = $_FILES['profile']['name'];
$tmp = $_FILES['profile']['tmp_name'];

if ($profile) {
	move_uploaded_file($tmp, "../users/$profile");
	mysqli_query($conn, "update users set username='$name',mobile='$phone',email='$email',age='$age',photo='$profile',modified_date=now() where userid='$id'");
	echo "<html><head><script>alert('Profile Updated Successfully');</script></head></html>";
	echo "<meta http-equiv='refresh' content='0; url=../profile.php'>"; 
}else{
	mysqli_query($conn, "update users set username='$name',mobile='$phone',email='$email',age='$age',modified_date=now() where userid='$id'");
	echo "<html><head><script>alert('Profile Updated Successfully');</script></head></html>";
	echo "<meta http-equiv='refresh' content='0; url=../profile.php'>"; 
}



 ?>