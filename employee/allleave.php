
<?php include"header.php"; 
session_start();
?>
<style type="text/css">
  .box
  {
    margin:20px 0px; 
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
                    <tr class="bg-secondary text-light">
                      <th>Sr No.</th>
                      <th>Leave From</th>
                      <th>Leave To</th>
                      <th>Earning leave</th>
                      <th>Medical leave</th>
                      <th>Casual leave</th>
                      <th>Leave applied by</th>
                      <th>Status</th>
                      <th>Comment</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    include "dbcon.php";
                    $i=1;
                    $uid=$_SESSION['id'];
                    $v="SELECT * FROM applyleave join user where user.uid=applyleave.applied_by && applied_by='$uid'";
                    $q=mysqli_query($con,$v);
                    while($res=mysqli_fetch_array($q))
                    {
                    ?>
                    <tr>
                      <td><?php echo $i++; ?></td>
                      <td><?php echo $res['leave_from'] ?></td>
                      <td><?php echo $res['leave_to'] ?></td>
                      <td><?php echo $res['earning_leave'] ?></td>
                      <td><?php echo $res['medical_leave'] ?></td>
                      <td><?php echo $res['casual_leave'] ?></td>
                      <td><?php echo $res['name'] ?></td>
                      <td> 
                        <?php
                        $status=$res['status']; 

                        if($status=='Aprooved')
                        { 
                          ?>
                        <button class="btn btn-success"><?php echo $res['status'] ?></button>
                        <?php } 

                        elseif($status=='Rejected')
                          {
                            ?>
                            <button class="btn btn-danger"><?php echo $res['status'] ?></button>
                        <?php } 
                        else
                          {
                            ?>
                         <button class="btn btn-primary"><?php echo $res['status'] ?></button>
                        <?php } ?>

                      </td>
                      <td>
                        <form method="post">
                          <textarea name="comment" class="form-control"><?php echo $res['comment'] ?></textarea>     
                      </td>              
                        </form>   
                    </tr>
                  <?php  } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>


