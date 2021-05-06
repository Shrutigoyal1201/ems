<?php include"dbcon.php"; 

$id=$_GET['id'];
$d="DELETE FROM user where uid=$id";
mysqli_query($con,$d);
header('location:dashboard.php');
?>

