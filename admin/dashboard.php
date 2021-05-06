<?php include"header.php" ?>
<br>

      <div class="container-fluid">
       <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header bg-info">
                <h4 class="card-title text-center text-light">REGISTERED EMPLOYEES</h4>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Password</th>
                      <th>Department</th>
                      <th>Role</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    include"dbcon.php";
                    $s="SELECT * FROM user";
                    $q=mysqli_query($con,$s);
                    while($r=mysqli_fetch_array($q))
                    {

                    ?>
                    <tr>
                      <td><?php echo $r['uid'] ?></td>
                      <td><?php echo $r['name'] ?></td>
                      <td><?php echo $r['email'] ?></td>
                      <td><?php echo $r['password'] ?></td>
                      <td><?php echo $r['dept'] ?></td>
                      <td><?php echo $r['role'] ?></td>
                      <td>
                        <a href="edituser.php?id=<?php echo $r['uid'] ?>"><button class="btn btn-outline-dark"> Edit details</button></a>
                        &nbsp;&nbsp;
                        <a href="deluser.php?id=<?php echo $r['uid'] ?>"><button class="btn btn-outline-danger"> Delete user</button></a>    
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div>
