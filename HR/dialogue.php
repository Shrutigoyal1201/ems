<?php include"header.php" ?>
<br>

<!DOCTYPE html>
<html>
<head>
	<title>HR - ATS</title>
	<style type="text/css">
	.box
	{
		height: 560px;
		border:2px;
		box-shadow: 0 5px 20px #7a7c7f;
    	border-radius: 20px;
    	overflow-y: scroll;

    }
	.nbox
	{
		margin: 0px -5px 20px 5px;
		border-radius: 10px;
		padding:10px 0px;
		box-shadow: 0 5px 20px #7a7c7f;
		overflow-y: scroll;
	}
	.bg
	{
		width: 100%;
		 padding: 20px;
		 text-align: center;
	}
	tr
	{
		height: 100px;
	}
	.alert-secondary
	{
		margin-right: 100px;
		font-size: 15px;
	}
	.alert-info
	{
		margin-left: 100px;
		font-size: 15px;
	}
	.p
	{
		margin: -10px -10px 0px -10px;
	}

</style>
  
</head>
<body>

	<div class="container-fluid">
		
		<div class="row">
			<div class="col-md-5 text-light nbox">
				<br>
				<form method="post">
					
					<?php 
					include'dbcon.php'; 
					$s="SELECT * FROM applicant";
					$q=mysqli_query($con,$s);
					while($r=mysqli_fetch_array($q))
					{
					?>
						<a href="dialogue.php?aid=<?php echo $r['id']?>" class="text-dark"><label class="alert alert-success bg"><?php echo $r['name']?></label></a>
					
					
					<?php } ?>
				</form>

			</div>
				
			<div class="col-md-7">
				<div class="content-wrapper" >
					<div class="box">
					<br>
					<h4 class="text-center">Dialogue box for Candidate/Recruiter interaction</h4> 
					<br>
					<?php  
					
					$aid=$_GET['aid'];

					$a="SELECT * FROM applicant where id='$aid'";
					$query=mysqli_query($con,$a);
					$res=mysqli_fetch_array($query);
					?>
					<h4 class="alert alert-danger text-center"><?php echo $res['name']; ?></h4>
					
					<br>
					<?php 

					$s2="SELECT*FROM hr_chat join applicant on hr_chat.aid=applicant.id where aid='$aid'";
					$q2=mysqli_query($con,$s2);
					while($r2=mysqli_fetch_array($q2))
					{
					?>
					<h6 class="alert alert-info"><?php echo $r2['hr_message']; ?></h6>
					
					<?php 
					}

					$s1="SELECT*FROM a_chat join applicant on a_chat.aid=applicant.id where aid='$aid'";
					$q1=mysqli_query($con,$s1);
					while($r1=mysqli_fetch_array($q1))
					{
					?>

					<h6 class="alert alert-secondary"><?php echo $r1['a_message']; ?></h6>
					
					<?php } ?>
		   			</div>
			  
		            <div class="row p">
		              <div class="card-body">
		              	<form method="post">
		              		<div class="row">
		                		<textarea class="form-control col-md-11" placeholder="Type your message here" name="hr_message"></textarea>
		                		<input type="hidden" name="aid" value="<?php echo $res['id'];?>">
		                		<button type="submit" name="send" value="send" class="btn btn-primary col-md-1">Send</button>
		                	</div>
		                </form>
		              </div>
		          </div>
		  	</div>
		</div>
	</div>
		

</body>
</html>

	
<?php 

	include'dbcon.php';

	if(isset($_POST['send']))
	{
		$aid=$_POST['aid'];
						
		$a=$_POST['hr_message'];

		$data="INSERT INTO hr_chat(hr_message,aid)values('$a','$aid')";
			
		$query=mysqli_query($con,$data);
			
			if($query)
			{
				echo "<script>alert('message sent: Refresh page')</script>";
			}
			else
			{
				echo "<script>alert('message could not be sent')</script>";
			}
		
	}
	?>

