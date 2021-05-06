<?php include"header.php" ?>
<br>

<!DOCTYPE html>
<html>
<head>
	<title>HR - (ATS)</title>
	<style type="text/css">
	.box
	{
		border:2px;
		box-shadow: 0 5px 20px;	
		margin-left: 15px;
	}
	h3
	{
		font-size: 20px;
	}
	.btn
	{
		width: 70px;
	}
	tr
	{
		 background-image: linear-gradient(45deg, #00507c, black);		
	}
	td
	{
		color: white;
	}
	.table-bordered td, .table-bordered th
	{
    border: 1px solid #181a1c;
	}
	.table thead th
	 {
    vertical-align: bottom;
    border-bottom: 2px solid #191c20;
	}


</style>
  
</head>
<body>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4">
				<center>
					<form method="post" class="box">

						<h6 class="bg-secondary text-secondary">xxxxxxxxx</h6>
						
						<h3 class="bg-dark text-light">ADD JOB DESCRIPTION</h3>
						<br><br>
						
							<div class="form-group">
								<label>Job Profile</label>
								<input type="text" name="job_profile" class="form-control" placeholder="Enter job profile">
							</div>
							<div class="form-group">
								<label>Salary</label>
								<input type="text" name="salary" class="form-control" placeholder="Enter salary ">
							</div>
							<div class="form-group">
								<label>Positions avaliable/vacancies</label>
								<input type="text" name="position" class="form-control" placeholder="Enter position ">
							</div>
							<button  type="submit" class="btn btn-dark" name="submit" value="Submit">Submit</button>
							<br><br>
						<h6 class="bg-secondary text-secondary">xxxxxxxxxx</h6>
						
					</form>
				</center>
			</div>

			<div class="col-md-8">
				  <div class="content-wrapper" >
		              <!-- /.card-header -->
		              <div class="card-body">
		                <table class="table table-bordered">
		                  <thead>                  
		                    <tr class="text-light">
		                      <th>Sr No.</th>
		                      <th>Job Profile</th>
		                      <th>Salary</th>
		                      <th>Position</th>
		                      <th>Current Job status</th>
		                      <th>Change Job status</th>
		                      <th>Action</th>
		                    </tr>
		                  </thead>
		                  <tbody>
			                    <?php
			                    include "dbcon.php";
			                    $i=1;
			                    
			                    $v="SELECT * FROM job";
			                    $q=mysqli_query($con,$v);
			                    while($res=mysqli_fetch_array($q))
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
				                        <button class="btn btn-sm btn-primary"><?php echo $res['job_status'] ?></button>
				                        <?php } 

				                        elseif($job_status=='Closed')
				                          {
				                            ?>
				                            <button class="btn btn-sm btn-danger"><?php echo $res['job_status'] ?></button>
				                        <?php } 
				                        else
				                          {
				                            ?>
				                         <button class="btn btn-sm btn-success"><?php echo $res['job_status'] ?></button>
				                        <?php } ?>
			                      </td>
			                      
			                         <form method="post">
			                          
			                         <input type="hidden" name="jid" value="<?php echo $res['jid'] ?>" >
			                      <td>
			                            <button type="submit" name="closed"  class="btn btn-sm btn-outline-danger" >Closed</button>
			                            <button type="submit" name="dormant"  class="btn btn-sm btn-outline-primary" >Dormant</button>
			                            <button type="submit" name="active"  class="btn btn-sm btn-outline-success" >Active</button>
			                            
			                        </form>   
			                      </td>

			                      <td>
			                      	<a href="editjob.php?jid=<?php echo $res['jid'];?>">Edit</a>
			                      </td>

			                    </tr>
			                  	<?php  } ?>
		                  </tbody>
		                </table>
		              </div>
		              <!-- /.card-body -->
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
			$a=$_POST['job_profile'];
			$b=$_POST['salary'];
			$c=$_POST['position'];
			$status="Active";

			$i="INSERT INTO job(job_profile,salary,position,job_status)values('$a','$b','$c','$status')";
			$query=mysqli_query($con,$i);

			if($query)
			{
				echo"<script>alert('Job added successfully')</script>";
			}
			else
				{
				echo"<script>alert('Job could not be added.. try again')</script>";
			}
		}
		?>
		
<?php

include 'dbcon.php';

if(isset($_POST['dormant']))
 {

    $job_status='Dormant';

    $jid=$_POST['jid'];

    $ad= "UPDATE job set job_status='$job_status' where jid=$jid";
    mysqli_query($con,$ad);
  }
if(isset($_POST['active']))
 {

    $job_status='Active';

    $jid=$_POST['jid'];

    $ad= "UPDATE job set job_status='$job_status' where jid=$jid";
    mysqli_query($con,$ad);
  }

if(isset($_POST['closed'])) 
{

    $job_status='Closed';

    $jid=$_POST['jid'];

    $ad= "UPDATE job set job_status='$job_status' where jid=$jid";
    mysqli_query($con,$ad);
}
?>


