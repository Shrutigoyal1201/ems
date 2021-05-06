<style type="text/css">.box
	{
		border:2px;
		box-shadow: 0 5px 20px;	
	}
</style>
<?php
include"header.php";
include"dbcon.php";

$id=$_GET['id'];

$s="SELECT*FROM task where tid=$id";
$query=mysqli_query($con,$s);
while($r=mysqli_fetch_array($query))
{
?>
<div class="content-wrapper text-center">
	
	<h3 class="text-center"> Task Details</h3>
	<br><br><br>

	<label class="bg-dark text-light">Employee's Name:&nbsp;&nbsp;&nbsp;<span class="bg-primary" ><?php echo $r['empname']; ?></span></label><br><br>


	Assigning Date:&nbsp;&nbsp;&nbsp;<?php echo $r['datetime']; ?><br><br>


	<center>Task:<textarea cols="8" rows="8" name="message" class="form-control" readonly="readonly" style="width: 500px;"><?php echo $r['message']; ?></textarea><br><br>
	Reply:<?php

		include 'dbcon.php';

		$id=$_GET['id'];

		$s="SELECT*FROM taskreply where tid=$id";
		$query=mysqli_query($con,$s);
		while($res=mysqli_fetch_array($query))
		{
		?>
		<div style="width:500px;" class="box">
		<h3 class="alert alert-info"><?php echo $res['m_reply']; ?></h3>
		</div>
		<?php } ?>
		<br><br>
	</center>
			
	Assigned by:&nbsp;&nbsp;&nbsp;<?php echo $r['assign_by']; ?><br><br>
	
</div>

<?php
}
?>

