<?php include"header.php" ?>

<style type="text/css">
	
	.boxb
		{
			border: 2px solid;
			margin-top: 40px;
			box-shadow: 10px 18px #bfd6d9;
			margin-bottom: 30px;
		
		}
		h4
		{
		background-color:#418e85;
		}
</style>
	<div class="container">

		<div class="row">

			<div class="col-md-12">

				<div class="boxb">

					<center>
					<form method="post" action="inuser.php">
						<br>
						<h4 class="text-center text-light">REGISTER HERE!</h4>
						<br><br>
						
						<div style="width: 400px;">
							
							<div class="form-group">
							<label>Name:</label>
							<input type="text" name="name" placeholder="Enter Name" class="form-control"></div>

							<div class="form-group">
							<label>Email:</label>
							<input type="text" name="email" placeholder="Enter Email"  class="form-control"></div>

							<div class="form-group">
							<label>Password:</label>
							<input type="password" name="password" placeholder="Enter password" class="form-control"></div>
						
							<div class="form-group">
							<label>Department:</label>
							<select name="dept" placeholder="Choose Department" class="form-control">
								<option>Select</option>
								<option>Frontend</option>
								<option>backend</option>
							</select>
							</div>

							<div class="form-group">
							<label>Role:</label>
							<select name="role" placeholder="Choose role" class="form-control">
								<option>Select</option>
								<option>Admin</option>
								<option>Employee</option>
								<option>HR/Manager</option>
							</select>
							</div>
						<br>
						</div>
						<input type="submit" name="submit" class="btn btn-outline-dark"></button>
					</form>
					</center>
					<br>
				</div>

			</div>

		</div>
		
	</div>

</body>
</html>