<?php include '../auth/connect.php';
 // $sql="select * from feedback";

 $name = $_POST['name'];
 $email = $_POST['email'];
 $subje = $_POST['subject'];
 $messg = $_POST['message'];

 $sql="INSERT INTO feedback (name, email, subj, msg,created_date) VALUES ('$name','$email','$subje','$messg',now());";
mysqli_query($conn, $sql);
header("location:contact.php");

?>

