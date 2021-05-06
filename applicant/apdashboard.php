<?php include"header.php"; 
session_start();
?>
<br><br>

<!DOCTYPE html>
<html>
<head>
	<title>Apply For JOB</title>
	<style type="text/css">
	.box
	{
		border:2px;
		box-shadow: 0 5px 20px;
		margin: 50px 0px;
	}
	h3
	{
		font-size: 20px;
	}
		.box1
	{
		height: 560px;
		border:2px;
		box-shadow: 0 5px 20px #7a7c7f;
    	border-radius: 20px;
    	margin-top: 50px;
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
		 color: white;
		 padding: 20px;
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

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<center>
					<h4>WELCOME TO GUEST LOGIN- REGISTER FOR JOB APPLICATION</h4>
					<form method="post" class="box" enctype="multipart/form-data">

						<h6 class="bg-secondary text-secondary">xxxxxxxxx</h6>
						
						<h3 class="bg-dark text-light">APPLY FOR A JOB</h3>
						<br><br>
							<div class="form-group">
								<label>Name</label>
								<input type="text" name="name" class="form-control" value="<?php echo $_SESSION['name']; ?>" readonly="readonly">
							</div>
							<div class="form-group">
								<label>College</label>
								<input type="text" name="college" class="form-control" placeholder="Enter college">
							</div>
							<div class="form-group">
								<label>Location</label>
								<input type="text" name="location" class="form-control" placeholder="Enter location">
							</div>
							

								<?php 
									include'dbcon.php';

									$s1="SELECT * FROM job where job_status='Active'";
									$q1=mysqli_query($con,$s1);
									?>
							
							<div class="form-group">
								<label>Choose Job profile</label>
								<select name="job_profile"class="form-control">
									<option>--Select--</option>	

									<?php while($r=mysqli_fetch_array($q1))
									{  
									?>
						
									<option><?php echo $r['job_profile']; } ?></option>
									
								</select>
							</div>
							
							<div class="col-md-6">
								<div class="form-group">
									<label>Salary Requirements</label>&nbsp;&nbsp;&nbsp;
									<input type="radio" id="yes" name="salary" value="yes">
									<label for="yes">Yes</label>
									<input type="radio" id="no" name="salary" value="no">
									<label for="no">No</label><br>
								</div>
							</div>

							<div class="col-md-6">
								
								<div class="form-group">
				                    <div class="input-group">
				                      <div class="custom-file">
				                        <input type="file" class="custom-file-input" name="cv">
				                       <label class="custom-file-label"  name="cv">Upload CV/RESUME- Choose file</label>
				                      </div>
				                      <div class="input-group-append">
				                        <span class="input-group-text"  name="cv">Upload</span>
				                      </div>
				                    </div>
				                </div>
							</div>
							<br>
							<button  type="submit" class="btn btn-dark" name="submit" value="Submit">Submit</button>
							<br><br>
						
					</form>
				</center>
			</div>
		</div>
	</div>

			<br>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				  <div class="content-wrapper" >
		              <!-- /.card-header -->
		              <h5 class="text-center">AVAILABLE JOBS</h5>
		              <div class="card-body">
		                <table class="table table-bordered">
		                  <thead>                  
		                    <tr class="bg-dark text-light">
		                      <th>Sr No.</th>
		                      <th>Job Profile</th>
		                      <th>Salary</th>
		                      <th>Position</th>
		                      <th>Current Job status</th>
		                    </tr>
		                  </thead>
		                  <tbody>
			                    <?php
			                    include "dbcon.php";
			                    $i=1;
			                    
			                    $s2="SELECT * FROM job";
			                    $q2=mysqli_query($con,$s2);
			                    while($res=mysqli_fetch_array($q2))
			                    {
			                    ?>
			                    <tr>
			                      <td><?php echo $i++; ?></td>
			                      <td><?php echo $res['job_profile'] ?></td>
			                      <td><?php echo $res['salary'] ?></td>
			                      <td><?php echo $res['position'] ?></td>
			                      <td><?php

				                        $job_status=$res['job_status']; 

				                        if($job_status=='Dormant')
				                        { 
				                          ?>
				                        	<h6 class="text-primary"><?php echo $res['job_status'] ?></h6>
				                        <?php } 

				                        elseif($job_status=='Closed')
				                          {
				                            ?>
				                            <h6 class="text-danger"><?php echo $res['job_status'] ?></h6>
				                        <?php } 
				                        else
				                          {
				                            ?>
				                         	<h6 class="text-success"><?php echo $res['job_status'] ?></h6>
				                        <?php } ?>
			                      </td>
			                    </tr>
			                  	<?php  } ?>
		                  </tbody>
		                </table>
		              </div>
		              <!-- /.card-body -->
		          </div>
		  	</div>
		  	<?php 
		                		include'dbcon.php';
		                		$n=$_SESSION['name'];
		                		$s4="SELECT * FROM applicant join user on applicant.name=user.name where applicant.name='$n'";
		                		$q4=mysqli_query($con,$s4);
		                		$r4=mysqli_fetch_array($q4);
		                		?>
	
			<div class="col-md-6">
				<div class="content-wrapper" >
					<div class="box1">
					<br>
					<h4 class="text-center">Dialogue box for Candidate/Recruiter interaction</h4> 
					<br>
					<h4 class="alert alert-danger text-center"><?php echo $r4['name']; ?></h4>
					<br>

					<?php 
					include 'dbcon.php';


					$aid=$r4['id'];

					$s1="SELECT*FROM hr_chat join applicant on hr_chat.aid=applicant.id where id='$aid'";
					$q1=mysqli_query($con,$s1);
					while($r1=mysqli_fetch_array($q1))
					{
					?>
					<h6 class="alert alert-secondary"><?php echo $r1['hr_message']; ?></h6>
					
					<?php }

					$s1="SELECT*FROM a_chat join applicant on a_chat.aid=applicant.id where id='$aid'";
					$q1=mysqli_query($con,$s1);
					while($r1=mysqli_fetch_array($q1))
					{
					?>
					<h6 class="alert alert-info"><?php echo $r1['a_message']; ?></h6>

					<?php } ?>
		   			</div>

		   			</div>
			
		            <div class="row p">
		              <div class="card-body">
		              	<form method="post" action="inchat.php">
		              		<div class="row">
		                		<textarea class="form-control col-md-11" placeholder="Type your message here" name="a_message"></textarea>
		                		
		                		<input type="hidden" name="aid" value="<?php echo $r4['id']?>">
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
		include 'dbcon.php';

		if(isset($_POST['submit']))
		{
			$a=$_POST['name'];
			$b=$_POST['college'];
			$c=$_POST['location'];
			$d=$_POST['salary'];
			$e=$_POST['job_profile'];


			$fn=$_FILES['cv']['name'];
			$tn=$_FILES['cv']['tmp_name'];

			$cv="../upload/".$fn;
			move_uploaded_file($tn,$cv);

			$i="INSERT INTO applicant(name,college,location,salary,cv,job_profile)values('$a','$b','$c','$d','$cv','$e')";
			$query=mysqli_query($con,$i);

			if($query)
			{
				echo"<script>alert('Thankyou! Your application has been submited successfully')</script>";
			}
			else
				{
				echo"<script>alert('Sorry! Your application could not be submited.. try again')</script>";
			}
		}
		?>

	


