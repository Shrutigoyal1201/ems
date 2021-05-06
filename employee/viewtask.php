
<?php
session_start();
include"header.php";
include"dbcon.php";

$id=$_GET['id'];

$s="SELECT*FROM task where tid=$id";
$query=mysqli_query($con,$s);
while($r=mysqli_fetch_array($query))
{
?>
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<br><br>
			
			<h3> Task Details</h3>
			<br><br>
			<label>Employee's Name:&nbsp;&nbsp;&nbsp;<?php echo $r['empname']; ?></label><br><br>
			Assigning Date:&nbsp;&nbsp;&nbsp;<?php echo $r['datetime']; ?><br><br>
			Assigned by:&nbsp;&nbsp;&nbsp;<?php echo $r['assign_by']; ?><br><br>
		</div>

		<div class="col-md-6">
			Task:<textarea cols="8" rows="8" name="message" class="form-control" readonly="readonly"><?php echo $r['message']; ?></textarea><br><br>
		
	<?php
}
?>	

		<form method="post">
			
			<input type="hidden" name="uid" value="<?php echo $_SESSION['id']?>">
			<input type="hidden" name="tid" value="<?php echo $id;?>">

			Reply:<textarea cols="8" rows="8" name="m_reply"class="form-control">Reply here!</textarea><br><br>
				
			<button type="submit" name='submitreply' class="btn btn-primary ">Submit reply</button>
		</form>

		<!--message display-->
		<?php

		include 'dbcon.php';

		$id=$_GET['id'];

		$s="SELECT*FROM taskreply where tid=$id";
		$query=mysqli_query($con,$s);
		while($r=mysqli_fetch_array($query))
		{
		?>

		<h3 class="alert alert-info"><?php echo $r['m_reply']; ?></h3>
		
		<?php } ?>
		
		</div>



	</div>
</div>

<?php 
include 'dbcon.php';

if(isset($_POST['submitreply']))
{	
	echo $uid=$_POST['uid'];
	echo $tid=$_POST['tid'];
	echo $r=$_POST['m_reply'];
	
	$i="INSERT INTO taskreply(uid,tid,m_reply)values('$uid','$tid','$r')";

	$q=mysqli_query($con,$i);	
}
