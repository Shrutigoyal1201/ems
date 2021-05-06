<?php include"header.php" ?>
<br>

<!DOCTYPE html>
<html>
<head>
	<title>HR - ATS</title>
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

</style>
  
</head>
<body>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
				
			<div class="col-md-8">
				<div class="content-wrapper" >
		              <!-- /.card-header -->
		              <div class="card-body">
		                <table class="table table-bordered box">
		                  <thead>                  
		                    <tr class="bg-info text-light">
		                      <th>Sr No.</th>
		                      <th>Open Positions/Vacancies</th>
		                      <th>Job Profile</th>
		                    </tr>
		                  </thead>
		                  <tbody>
			                    <?php
			                    include "dbcon.php";
			                    $i=1;
			                    
			                    $v="SELECT position, job_profile FROM job where job_status='Active' ";
			                    $q=mysqli_query($con,$v);
			                    while($res=mysqli_fetch_array($q))
			                    {
			                    ?>
			                    <tr>
			                      <td><?php echo $i++; ?></td>
			                      <td><?php echo $res['position'] ?></td>
			                      <td><?php echo $res['job_profile'] ?></td>
			                     
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

	