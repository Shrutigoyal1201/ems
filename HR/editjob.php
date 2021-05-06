<?php 
include 'header.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>HR - ATS</title>
	<style type="text/css">
	.box
	{
		height: 450px;
		border:2px;
		box-shadow: 0 5px 20px;	
		margin-left: 20px;
	}
	h3
	{
		font-size: 20px;
	}

</style>
  
</head>
<body>

	<div class="container-flujid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<center>
					<form method="post" class="box">

						<h6 class="bg-secondary text-secondary">xxxxxxxxx</h6>
						
						<h3 class="bg-dark text-light">UPDATE/EDIT JOB DESCRIPTION</h3>
						<br><br>

						<?php 
						include'dbcon.php';

						$jid=$_GET['jid'];
						$s="SELECT * FROM job where jid='$jid'";
						$q=mysqli_query($con,$s);
						$r=mysqli_fetch_array($q);						?>
						
							<div class="form-group">
								<label>Job Profile</label>
								<input type="text" name="job_profile" class="form-control" value="<?php echo $r['job_profile'] ?>">
							</div>
							<div class="form-group">
								<label>Salary</label>
								<input type="text" name="salary" class="form-control" value="<?php echo $r['salary'] ?>">
							</div>
							<div class="form-group">
								<label>Positions avaliable/vacancies</label>
								<input type="text" name="position" class="form-control" value="<?php echo $r['position'] ?>">
							</div>
							<button  type="submit" class="btn btn-dark" name="update" value="Update">Update</button>
							<br><br>
						
					</form>
				</center>
			</div>
			<div class="col-md-2"> </div>
		</div>
	</div>
</body>
</html>

<?php

include 'dbcon.php';

		if(isset($_POST['update']))
		{
			$jid=$_GET['jid'];
			$a=$_POST['job_profile'];
			$b=$_POST['salary'];
			$c=$_POST['position'];
			
			$i="UPDATE job set job_profile='$a', salary='$b' ,position='$c' where jid='$jid'";
			$query=mysqli_query($con,$i);

			if($query)
			{
				echo"<script>alert('Job description updated successfully')</script>";
				header('location:hrdashboard.php');
			}
			else
				{
				echo"<script>alert('Job could not be updated.. try again')</script>";
			}
		}
		?>