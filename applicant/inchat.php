<?php 

	include'dbcon.php';

	if(isset($_POST['send']))
	{
		echo $aid=$_POST['aid'];
						
		echo $a=$_POST['a_message'];

		$data="INSERT INTO a_chat(a_message,aid)values('$a','$aid')";
			
		$query=mysqli_query($con,$data);
			
			if($query)
			{
				header('location:apdashboard.php');
			}
			else
			{
				echo "<script>alert('Message not sent')</script>";
			}
		
	}
	?>