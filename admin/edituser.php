<?php include 'dbcon.php'; ?>
<?php include'header.php'; ?>
<style type="text/css">
	
	.boxb
		{
			border: 2px solid;
			margin-top: 40px;
			box-shadow: 7px 10px;
		
		}
		h4
		{
			background-color: black;
		}
</style>
	<div class="container">

		<div class="row">

			<div class="col-md-12">

				<div class="boxb">

					<center>
					<form method="post" action="upuser.php">
						<br>
						<h4 class="text-center text-light">MAKE CHANGES HERE!</h4>
						<br><br>
						<?php 
						$id=$_GET['id'];
						include'dbcon.php';
						$s="SELECT * FROM user where uid='$id'";
						$q=mysqli_query($con,$s);
						while($r=mysqli_fetch_assoc($q))
						{
						?>
						<div style="width: 400px;">
							<input type="hidden" name="uid" value="<?php echo $r['uid'];?>" >

							<div class="form-group">
							<label>Name:</label>
							<input type="text" name="name" value="<?php echo $r['name']; ?>" class="form-control"></div>

							<div class="form-group">
							<label>Email:</label>
							<input type="text" name="email" value="<?php echo $r['email']; ?>"   class="form-control"></div>

							<div class="form-group">
							<label>Password:</label>
							<input type="password" name="password" value="<?php echo $r['password']; ?>"  class="form-control"></div>
						
							<div class="form-group">
							<label>Department:</label><br>
							<input type="text" value="<?php echo $r['dept']; ?>" readonly="readonly" class="form-control"/>
							<select class="form-group" name="dept" >
								<option>Select</option>
								<option>Frontend</option>
								<option>backend</option>
							</select>
							</div>

							<div class="form-group">
							<label>Role:</label><br>
							<input type="text" value="<?php echo $r['role']; ?>" readonly="readonly" class="form-control" />
							<select class="form-group" name="role">
								<option>Select</option>
								<option>Admin</option>
								<option>Employee</option>
								<option>HR/Manager</option>
								<option>Applicant</option>
							</select>
							</div>
						</div>
						<button name="update" class="btn btn-dark" >UPDATE</button>
							<?php } ?>
					</form>
					</center>

				</div>

			</div>

		</div>
		
	</div>

</body>
</html>