<?php include"header.php"; 
session_start();
?>
  
          <div class="content-wrapper" >
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>

                      <th style="width: 10px">#</th>
                      <th>Employee's Name</th>
                      <th>Assined by</th>
                      <th>Task</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    include "dbcon.php";
                   
                    $s="SELECT name FROM user where role='admin'";
                    $n=mysqli_query($con,$s);
                    $r=mysqli_fetch_array($n);
                    $assign_by=$r['name'];

                    $v="SELECT * FROM task join user on user.uid=task.empname";
                    $i=0;

                    $q=mysqli_query($con,$v);
                    while($res=mysqli_fetch_array($q))
                    {

                    ?>
                    <tr>
                      <td><?php echo $i++; ?></td>
                      <td><?php echo $res['name'] ?></td>
                      <td><?php echo $assign_by; ?></td>
                      <td><?php echo $res['message'] ?></td>
                      <td> <a href="showtask.php?id=<?php echo $res['tid']?>" class="btn btn-info">View</a>
                    </tr>
                  <?php  } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

