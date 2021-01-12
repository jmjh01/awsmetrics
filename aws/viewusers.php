<?php
  include("include/connect.php");
  include("header.php");
  include("menu.php");
?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600"><?php echo $_SESSION["username"]?></span>
                <i class="fas fa-user-shield"></i>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Change Password
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-info">View User</h6>
                  <a href="adduser" class="btn btn-success btn-sm btn-icon-split pullright" >
                    <span class="icon text-white-50">
                      <i class="fas fa-plus"></i>
                    </span>
                    <span class="text" data-toggle="tooltip" data-placement="top">Add</span>
                  </a>
            </div>
            <form id="edituser" method="post">
               <!--  <input type="hidden" name="eid" id="eid">
                <input type="hidden" name="aid" id="aid">
                <input type="hidden" name="mid" id="mid" value="1">
             </form>  -->
            
            <div class="card-body">

              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>SNo</th>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Role</th>
                      <th>Transcriber Id</th>
                      <th>Options</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                        $r=mysqli_query($mysqli,"select * from tbl_amz_users  where isdelete=0 order by empid desc") or die(mysqli_error());
                        $i=1;
                       while($row_a=mysqli_fetch_array($r))
                      {
                         $d_id=$row_a['empid'];
                      ?>
                      <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $row_a['empid'];?></td>
                        <td><?php echo $row_a['empname']?></td>
                        <td><?php if($row_a['isadmin']==1){echo "Admin";}else{echo 'User';}?></td>
                        <td><?php echo $row_a['tid']?></td>
                        <td>                          
                          <span class="badge badge-info badge-pill cursorpoint" data-toggle="modal" data-target="#editModal" onClick="editfun('<?php echo $d_id;?>');"><i class="fas fa-edit fa-fw"></i> Edit</span>
                          <span class="badge badge-info badge-pill cursorpoint" onClick="deletefun('<?php echo $row_a['empid'];?>');"><i class="fas fa-edit fa-fw"></i> Delete</span>       
                        </td>
                      </tr>
                    <?php 
                    $i++;
                      }
                      ?>
                    <input type="hidden" name="editid" id="editid">
             <input type="hidden" name="type" id="type" value="0">
                    
                  </tbody>
                </table>
              </div>
            </div>
          </form>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
<?php
include("footer.php");
?>
  
  <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete </h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Are you sure to delete the user </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="#" onclick="daioper()">Confirm</a>
        </div>
      </div>
    </div>
  </div>

   
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>
  <script>

  $('#viewusers').addClass("active");
  $('#collapseThree').addClass("show");
  $('#submenu2').addClass("show");

jQuery(document).ready(function() {
    $('#alert1').fadeIn('slow').delay(3000).fadeOut('slow'); 
    $('#alert2').fadeIn('slow').delay(3000).fadeOut('slow'); 
    $('#alert3').fadeIn('slow').delay(3000).fadeOut('slow'); 
  });

function editfun(a){
   $('#editid').val(a);
   queryString = "edituser.php";
   var tump = document.forms['edituser'];
   tump.action = queryString
   tump.submit();
}

function deletefun(a){
  $('#editid').val(a);
  $('#type').val(6);
  queryString = "mastersadd.php";
  var tump = document.forms['edituser'];
  tump.action = queryString
  tump.submit();
}

function addalertfun(){
  $("#addalert").show();
  $('#addalert').fadeIn('slow').delay(3000).fadeOut('slow'); 
}

</script>
</body>

</html>
