<?php include 'dbcon.php'; 

echo $id=$_GET['id'];
$d="DELETE FROM task where tid='$id'";
mysqli_query($con,$d);
header('location:allassignedtask.php')
?>


