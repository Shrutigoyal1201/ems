
<?php 
session_start(); 
include"header.php" ?>

<style type="text/css">
	
		.btn
		{
			width: 110px;
			border-radius: 20px;
			color: #fff;
   			background-color: #1d2124;
    		border-color: #f8f9fa;
		}
		.box
		{
		border-radius: 5%;
	    margin-top: 150px;
	    border: 2px solid;
	    box-shadow: 15px 15px #212529;
	    padding: 50px 0px;
	    background-image: linear-gradient(45deg, black, #00507c);
		}

		.bg
		{
			background-color:#f7f7f7;
		}
</style>

	<div class="container-fluid">

		<div class="row bg">

			<div class="col-md-6">
				<img src="https://www.kindpng.com/picc/m/208-2088536_transparent-worker-png-employees-clipart-png-download.png" class="img-fluid">

			</div>

			<div class="col-md-1">
			</div>

			<div class="col-md-4">

				<div class="box ">
					<h3 class="text-center text-light">Welcome!</h3>
					<center>
					<form method="post" action="login.php" style="width:200px;">

						<br>

						<div class="form-group">
						<input type="text" name="email" placeholder="Enter Email" class="form-control"></div>
						<br>

						<div class="form-group">
						<input type="password" name="password" placeholder="Enter password" class="form-control"></div>
						<br>

						<button type="submit" name="login" class="btn btn-primary">Login</button>

						<br><br><p class="text-light">
						<?php 

					   if(isset($_SESSION['id']))
					   {
					     $_SESSION['id'];
					     unset($_SESSION['id']);
					   }

					   if(isset($_SESSION['error']))
					   {
					     echo $_SESSION['error'];
					     unset($_SESSION['error']);
					   }

					  	?></p>

					  	<button type="submit" class="btn btn-primary btn-sm"><a href="applicantsignup.php" class="text-light">Guest Login</a></button>
						
					</form>
					</center>

				</div>

			</div>

			<div class="col-md-1">
			</div>			

		</div>
		
	</div>




</body>
</html>