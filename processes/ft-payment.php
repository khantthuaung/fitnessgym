<?php 
include_once '../auth/connect.php';

$uname=$_POST['username'];
$uid=$_POST['uid'];
$pid=$_POST['pid'];
$method=$_POST['payment'];


$sql=mysqli_query($conn, "select * from plan where pid='$pid'");
$value=mysqli_fetch_row($sql);
date_default_timezone_set("Asia/Yangon"); 
$d=strtotime("+".$value[3]."Months");
$cdate=date("Y-m-d"); //current date
$expiredate=date("Y-m-d",$d);

$res=mysqli_query($conn,"update enrolls_to pid=$pid, uid=$uid, paid_date='$cdate', method='$method', expire='$expiredate',renewal='yes'");
if ($res==1) {
	echo "<head><script>alert('Successfully Subscribed Plan!');</script></head></html>";
	echo "<meta http-equiv='refresh' content='0; url=../profile.php'>";
}
else{
	echo "<head><script>alert('Error!');</script></head></html>";
}




 ?>