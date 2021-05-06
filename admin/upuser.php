<?php 

include "dbcon.php";

if(isset($_POST['update']))
{
	$id=$_POST['uid'];
	$n=$_POST['name'];
	$e=$_POST['email'];
	$p=$_POST['password'];
	$d=$_POST['dept'];
	$r=$_POST['role'];

	$up="UPDATE user set name='$n', email='$e', password='$p', dept='$d', role='$r' where uid='$id'";

	$query=mysqli_query($con,$up);

	if ($query) 
	{
		header('location:dashboard.php');
		echo "<script>alert('data updated successfully')</script>";
	}
	else
	{

		echo "<script>alert('data could not be updated')</script>";
	}
}

