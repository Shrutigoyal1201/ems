<?php include"header.php" ?>
<br>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
	.box
	{
		border:2px;
		box-shadow: 0 5px 20px;	
	}
	h3
	{
		font-size: 20px;
	}

</style>
  
</head>
<body>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-1"></div>
				
			<div class="col-md-10">
				<div class="content-wrapper" >
		              <!-- /.card-header -->
		              <div class="card-body">
		                <table class="table table-bordered box">
		                  <thead>                  
		                    <tr class="bg-dark text-light">
		                      <th>Sr No.</th>
		                      <th>Applicant's Name</th>
		                      <th>College</th>
		                      <th>Location</th>
		                      <th>Salary requirements</th>
		                      <th>Job Profile</th>
		                      <th>CV/Resume</th>
		                    </tr>
		                  </thead>
		                  <tbody>
			                    <?php
			                    include "dbcon.php";
			                    $i=1;
			                    
			                    $v="SELECT * FROM applicant";
			                    $q=mysqli_query($con,$v);
			                    while($res=mysqli_fetch_array($q))
			                    {
			                    ?>
			                    <tr>
			                      <td><?php echo $i++; ?></td>
			                      <td><?php echo $res['name'] ?></td>
			                      <td><?php echo $res['college']?></td>
			                      <td><?php echo $res['location']?></td>
			                      <td><?php echo $res['salary']?></td>
			                      <td><?php echo $res['job_profile'] ?></td>
			                      <td><?php echo $res['cv']?></td>
			                     
			            		</tr>
			                  	<?php  } ?>
		                  </tbody>
		                </table>
		              </div>
		              <!-- /.card-body -->
		        </div>
		  	</div>

		  	<div class="col-md-1"></div>
		</div>
	</div>
		

</body>
</html>

	