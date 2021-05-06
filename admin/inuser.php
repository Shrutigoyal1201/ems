<?php 

include "dbcon.php";

if(isset($_POST['submit']))
{
	$n=$_POST['name'];
	$e=$_POST['email'];
	$p=$_POST['password'];
	$d=$_POST['dept'];
	$r=$_POST['role'];

	$i="INSERT INTO user(name,email,password,dept,role)values('$n','$e','$p','$d','$r')";

	$query=mysqli_query($con,$i);

	if($query)
	{
		header('location:dashboard.php');
	}
}

