<?php include"header.php" ?>

<style type="text/css">
	
	.boxb
		{
			border: 2px;
			margin-top: 40px;
			box-shadow: 0 5px 20px #7a7c7f;
			margin-bottom: 30px;
			border-radius: 50px;
		}
		
</style>
	<div class="container">

		<div class="row">
			<div class="col-md-3"></div>
			
			<div class="col-md-6 col-sm-4">

				<div class="boxb">

					<center>
					<form method="post">
						<br><br>
						<h4 class="text-center alert alert-success">SIGN UP/CREATE ACCOUNT HERE!</h4>
						<br>
						
							<div class="form-group">
							<label>Name:</label>
							<input type="text" name="name" placeholder="Enter Name" class="form-control"></div>
							
							<div class="form-group">
							<label>Email:</label>
							<input type="text" name="email" placeholder="Enter Email"  class="form-control"></div>

							<div class="form-group">
							<label>Password:</label>
							<input type="password" name="password" placeholder="Enter password" class="form-control"></div>
						
							
						<br>
						<input type="submit" name="submit" class="btn btn-outline-dark">
					</form>
					</center>
					<br>
				</div>

			</div>

			<div class="col-md-3"></div>
			
		</div>
		
	</div>

</body>
</html>

<?php 

include "dbcon.php";

if(isset($_POST['submit']))
{
	$n=$_POST['name'];
	$e=$_POST['email'];
	$p=$_POST['password'];
	$d='Frontend';
	$r='Applicant';

	$i="INSERT INTO user(name,email,password,dept,role)values('$n','$e','$p','$d','$r')";

	$query=mysqli_query($con,$i);

	if($query)
	{
		echo "Sign Up successfull";
		header('location:index.php');
	}
}

