<?php include"header.php"; 
session_start();
?>
<style type="text/css">
	.box
	{
		padding:50px 0px; 
		margin:50px 0px; 
		height: 600px;
		width: 600px;
		border:2px;
		box-shadow: 0 5px 20px;	
	}

</style>
  
          <div class="content-wrapper" >
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr class="bg-info text-light">
                      <th>Sr No.</th>
                      <th>Valid_from</th>
                      <th>Valid_to</th>
                      <th>Earning leave</th>
                      <th>Medical leave</th>
                      <th>Casual leave</th>
                      <th>Assigned by</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    include "dbcon.php";

                    $s="SELECT name FROM user where role='admin' ";
                    $n=mysqli_query($con,$s);
                    $r=mysqli_fetch_array($n);
                    $assign_by=$r['name'];


                    $i=1;
                    $v="SELECT * FROM assignleave where empname='".$_SESSION['id']."'";
                    $q=mysqli_query($con,$v);
                    while($res=mysqli_fetch_array($q))
                    {

                    ?>

                    <tr>
                      <td><?php echo $i++; ?></td>
                      <td><?php echo $res['valid_from'] ?></td>
                      <td><?php echo $res['valid_to'] ?></td>
                    
                    <?php 

                    include 'dbcon.php';
                    $uid=$_SESSION['id'];
                    $s="SELECT*FROM applyleave where applied_by='$uid'";
                    $q2=mysqli_query($con,$s);
                    while($r=mysqli_fetch_array($q2))
                    {
                    
	                    if($r['status']=='Aprooved')
	                    {
		                    if(isset($res['earning_leave'])) //if($res['earning_leave']!='\0')
		                    {
		                    	$res['earning_leave']=$res['earning_leave']-$r['earning_leave'];
		                    } 
		                  	if(isset($r['medical_leave']))
		                  	{
		                  		$res['medical_leave']=$res['medical_leave']-$r['medical_leave'];
		                    } 
		                  	if(isset($r['casual_leave']))
		                  	{
		                  		$res['casual_leave']=$res['casual_leave']-$r['casual_leave'];
		                    }
		                }
		            }

		            ?>
		            
		              <td><?php echo $res['earning_leave'] ?></td>
	                  <td><?php echo $res['medical_leave'] ?></td>
	                  <td><?php echo $res['casual_leave'] ?></td>
	
                      <td><?php echo $assign_by ?></td>
                    </tr>
                  <?php  } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
<center>
	<form method="post" class="box">
		
			<input type="hidden" name="uid" value="<?php echo $_SESSION['id'] ?>">
			
			<div class="form-group">
				<label>Leave From </label>
				<input type="date" name="leave_from" class="form-control" placeholder="Enter Date ">
			</div>
			<div class="form-group">
				<label>Leave To </label>
				<input type="date" name="leave_to" class="form-control" placeholder="Enter Date ">
			</div>
			<div class="form-group">
				<label>Earning Leave </label>
				<input type="text" name="earning_leave" class="form-control" placeholder="Enter Leave ">
			</div>
			<div class="form-group">
				<label>Medical Leave </label>
				<input type="text" name="medical_leave" class="form-control" placeholder="Enter Leave ">
			</div>

			<div class="form-group">
				<label>Casual Leave </label>
				<input type="text" name="casual_leave" class="form-control" placeholder="Enter Leave ">
			</div>
			<button  type="submit" class="btn btn-secondary" name="submit" value="Assign">Assign</button>

		</form>
	</center>
		

		<?php
		if(isset($_POST['submit']))
		{
			$a=$_POST['uid'];
			$b=$_POST['leave_from'];
			$c=$_POST['leave_to'];
			$d=$_POST['earning_leave'];
			$e=$_POST['medical_leave'];
			$f=$_POST['casual_leave'];
			$status="pending";

			$i="INSERT INTO applyleave(applied_by,leave_from,leave_to,earning_leave,medical_leave,casual_leave,status)values('$a','$b','$c','$d','$e','$f','$status')";
			$query=mysqli_query($con,$i);

			if($query)
			{
				echo"<script>alert('leave application sent successfully')</script>";
			}
			else
				{
				echo"<script>alert('leave application could not be sent')</script>";
			}
		}
		?>