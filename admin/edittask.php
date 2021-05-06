<?php 
session_start();
include"header.php" ?>

<style type="text/css">
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

				 	<h5 class="bg-info text-center text-light">EMPLOYEES LIST</h5>
				 	<h5 class="bg-secondary text-center text-secondary">aaaaaaaaaaaa</h5>
				 	
				 	<br><br>
				 	<form method="post">
				 		
					<?php
					include"dbcon.php";
					// $id=$_GET['id'];
					$s="SELECT*FROM user where role='Employee' order by uid desc";
					$q=mysqli_query($con,$s);
					while($r=mysqli_fetch_array($q))
					{
					 ?>
				 		<div class="form-check">
						  <input class="form-check-input" name="empname[]" type="checkbox" value="<?php echo $r['uid'] ?>" id="check">
						  <?php echo $r['name'] ?>
						</div>
				 	<input type="hidden" name="assign_by" value="<?php echo $_SESSION['id']?>">
				 	<br>
				 	<br>
				 	<?php } ?>
					<h5 class="bg-secondary text-center text-secondary">aaaaaaaaaaaa</h5>
				 	
			</div>
			<div class="col-md-1">
				
			</div>

			<div class="col-md-7">
				<?php include"dbcon.php";

						$id=$_GET['id'];

						$s="SELECT*FROM task where tid=$id";
						$query=mysqli_query($con,$s);
						$r=mysqli_fetch_array($query);
							?>

				<form>
					<textarea cols="10" rows="10" name="message" class="form-control"><?php echo $r['message'];?></textarea>
					<br><br>
					<button type="submit" name="assignnew" class="btn btn-dark btn-block">Assign New Task</button><br>
					
				</form>

			</div>
				 	
		</form>
		</div>
	</div>

	<br><br>
				<?php
				include 'dbcon.php';
				if(isset($_POST['assignnew']))
				{
					$e=$_POST['empname'];
					$a=$_POST['assign_by'];
					$m=$_POST['message'];
					// print_r($e);
					
					foreach($e as $employeelist)
					{

						$data="UPDATE task set empname='$employeelist', assign_by='$a', message='$m' where tid=$id";
						$query=mysqli_query($con,$data);
						if($query)
						{
							echo "<script>alert('task assigned successfully')</script>";
						}
						else
						{
							echo "<script>alert('task could not be assigned')</script>";
						}
					}
				}
				?>