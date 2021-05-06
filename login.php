<?php session_start(); ?>
<?php include"dbcon.php";

if(isset($_POST['login']))
{
	echo $e=$_POST['email'];
	echo $p=$_POST['password'];

	$s="SELECT * FROM user where email='$e' && password='$p' ";

	$query=mysqli_query($con,$s);
  	$total=mysqli_num_rows($query);
  	$data=mysqli_fetch_array($query);

  	// echo $data['role'];

	  if($total==1)
	  {
	  	$role=$data['role'];

	  	if($role=='Admin')
	  	{
	  		$_SESSION['id']=$data['uid'];
	    	header('location:admin/dashboard.php');
	  	}
	  	elseif($role=='Employee')
	  	{
	  		$_SESSION['id']=$data['uid'];
	    	header('location:employee/empdashboard.php');
	  	}
	  	elseif($role=='HR/Manager')
	  	{
	  		$_SESSION['id']=$data['uid'];
	    	header('location:HR/hrdashboard.php');
	  	}
	  	elseif($role=='Applicant')
	  	{
	  		$_SESSION['id']=$data['uid'];
	    	$_SESSION['name']=$data['name'];
	    	header('location:applicant/apdashboard.php');
	  	}
	  	 else
	  	{
	    	$_SESSION['error']="Invalid Credentials";
	    	header('location:index.php');
	  	}

	   }
	  else
	  {
	    $_SESSION['error']="Invalid Credentials";
	    header('location:index.php');
	  }
}

?>