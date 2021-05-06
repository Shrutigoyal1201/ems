<?php include"header.php"; 
session_start();
?>
  
          <div class="content-wrapper" >
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr class="bg-info text-light">
                      <th>Sr No.</th>
                      <th>Task</th>
                      <th>Date</th>
                      <th>Assigned by</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    include "dbcon.php";
                    $i=1;
                    $v="SELECT * FROM task where empname='".$_SESSION['id']."'";
                    $q=mysqli_query($con,$v);
                    while($res=mysqli_fetch_array($q))
                    {
                    ?>
                    <tr>
                      <td><?php echo $i++; ?></td>
                      <td><?php echo $res['message'] ?></td>
                      <td><?php echo $res['datetime'] ?></td>
                      <td><?php echo $res['assign_by'] ?></td>
                      <td> 
                        <a href="viewtask.php?id=<?php echo $res['tid']?>"><button class="btn btn-outline-dark">Show task</button></a>
                      </td>
                    </tr>
                  <?php  } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

