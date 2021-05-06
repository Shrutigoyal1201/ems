<?php 
session_start();
include"header.php" ?>

<style>
	
	.box
	{
		border:2px;
		box-shadow: 0 5px 20px;
	}
</style>


<br><br><br>
	<div class="container">
		<div class="row">
			<div class="col-md-4 box">
				
				<form method="post" >
		
				 	<h5 class="bg-dark text-center text-light">EMPLOYEES LIST</h5>
				 	<h5 class="bg-warning text-center text-warning">aaaaaaaaaaaa</h5>
				 	
				 	<br><br>
				 		
				 	<?php include"dbcon.php";

					$s="SELECT*FROM user where role='Employee' order by uid desc";
					$q=mysqli_query($con,$s);
					while($r=mysqli_fetch_array($q))
					{
					 ?>
				 		<div class="form-check">
						  <input class="form-check-input" name="empname[]" type="checkbox" value="<?php echo $r['uid'] ?>" id="check">
						  <?php echo $r['name'] ?>
						</div>
						<br>

				 	<?php } ?>
				 	<input type="hidden" name="assign_by" value="<?php echo $_SESSION['id']?>">
				 	<br><br><br>
				 	<h5 class="bg-warning text-center text-warning">aaaaaaaaaaaa</h5>
				 	
			</div>
			<div class="col-md-1">
				
			</div>

			<div class="col-md-7">
		<form method="post">
			<div class="form-group">
				<label>Valid From </label>
				<input type="date" name="valid_from" class="form-control" placeholder="Enter Date ">
			</div>
			<div class="form-group">
				<label>Valid To </label>
				<input type="date" name="valid_to" class="form-control" placeholder="Enter Date ">
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
			<button  type="submit" class="btn btn-secondary" name="assign" value="Assign">Assign</button>
			<button  type="submit" class="btn btn-secondary"><a href="allleave.php" class="text-light">All assigned leaves</a></button>

		</form>
	</div>
</div>
</div>


<?php include"dbcon.php"; 


if(isset($_POST['assign']))
{
	$vf=$_POST['valid_from'];
	$vt=$_POST['valid_to'];
	$el=$_POST['earning_leave'];
	$ml=$_POST['medical_leave'];
	$cl=$_POST['casual_leave'];

	$a=$_POST['assign_by'];
	$e=$_POST['empname'];
					
	foreach($e as $employeelist)
	
	{

	$data="INSERT INTO assignleave(valid_from,valid_to,earning_leave,medical_leave,casual_leave,assign_by,empname)values('$vf','$vt','$el','$ml','$cl','$a','$employeelist')";

						$query=mysqli_query($con,$data);
						if($query)
						{
							echo "<script>alert('leave assigned successfully')</script>";
						}
						else
						{
							echo "<script>alert('leave could not be assigned')</script>";
						}
					}
}

?>

