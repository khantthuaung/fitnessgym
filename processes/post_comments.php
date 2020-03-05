<?php 
include_once '../auth/connect.php';
session_start();
$pid=$_POST['pid'];
$uid=$_SESSION['user'];
$comment=$_POST['comment'];

mysqli_query($conn, "insert into comments(p_id, u_id, text, created_date, modified_date) values($pid, $uid, '$comment',now(),now())");
header("location:../blog_single.php?id=$pid");




 ?>