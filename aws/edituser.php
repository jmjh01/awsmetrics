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
              <h6 class="m-0 font-weight-bold text-info"> Edit User </h6>
            </div>
            <form id="user" method="post" autocomplete="off" >
            <div class="card-body">
              <div class="row">
                <?php
                $r=mysqli_query($mysqli,"select * from tbl_amz_users where empid = '".$_POST["editid"]."' ")or die(mysqli_error($mysqli));
                $row = mysqli_fetch_array($r);
                 ?>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlInput1"> Employee Id </label>
                        <span class="error">*</span>
                        <input class="form-control" id="empid" name="empid" type="text" 
                        placeholder="eg.Emp01" value="<?php echo $row["empid"]; ?>" readonly>
                    </div>

                    <div class="form-group">
                          <label for="exampleFormControlSelect1">Role</label>
                          <span class="error">*</span>
                          <select class="form-control" id="role" name="role">
                            <option value="">--Select--</option>
                            <option value="1" <?php if ($row["isadmin"]=="1") {
                              echo "selected='selected'";
                            } ?>>Admin</option>
                            <option value="2" <?php if ($row["isadmin"]=="2") {
                              echo "selected='selected'";
                            } ?>>User</option>
                          </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleFormControlInput1"> Employee Name </label>
                        <span class="error">*</span>
                        <input class="form-control" id="empname" name="empname" type="text" placeholder="eg.Arun" value="<?php echo $row["empname"]; ?>">
                    </div>

                      <div class="form-group">
                          <label for="exampleFormControlSelect1">Transcriber Id</label>
                          <span class="error">*</span>
                          <input class="form-control" type="text" id="tid" name="tid" value="<?php echo $row["tid"] ?>" readonly >
                      </div>
                     
                  </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                <center>
                    <button class="btn btn-success" type="button" onclick="edituser('<?php echo $row['empid']; ?>')">Update</button>
                    <button class="btn btn-warning" type="button">Reset</button>
                </center>
              </div>
              </div>
            </div>
             <input type="hidden" name="editid" id="editid">
             <input type="hidden" name="type" id="type" value="0">
          </form>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Amazon 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="index">Logout</a>
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
  <script src="js/bootstrap-datepicker.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>
  <script type="text/javascript">

function edituser(a){
  $('#editid').val(a);
  $('#type').val(5);
  queryString = "mastersadd.php";
  var temp = document.forms['user'];
  temp.action = queryString
  temp.submit();
}

  $('#master2').addClass("active");
  $('#collapseThree').addClass("show");
  $('#submenu2').addClass("show");
  $(document.body).on('change',"#graduation",function (e) {
   var optVal= $("#graduation option:selected").val();
   var myform = document.getElementById("entry");
        var fd = new FormData(myform );
        $.ajax({
            url: "entryprogramreload",
            data: fd,
            cache: false,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function (dataofconfirm) {
             
               if(dataofconfirm==1){
                  
               }else{
                  $('#programc').html(dataofconfirm);
               }
            }
        });

        $.ajax({
            url: "entrymarks",
            data: fd,
            cache: false,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function (dataofconfirm1) {
             
               if(dataofconfirm1==1){
                   
               }else{
                  $('#programm').html(dataofconfirm1);
               }
            }
        });
});

  $(document.body).on('change',"#office",function (e) {
   var optVal= $("#office option:selected").val();
   var myform = document.getElementById("entry");
        var fd = new FormData(myform );
        $.ajax({
            url: "entryprogramreload",
            data: fd,
            cache: false,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function (dataofconfirm) {
             
               if(dataofconfirm==1){
                    
               }else{
                  $('#programc').html(dataofconfirm);
               }
            }
        });
});

 jQuery(document).ready(function() {
    $('#alert1').fadeIn('slow').delay(3000).fadeOut('slow'); 
    $('#alert2').fadeIn('slow').delay(3000).fadeOut('slow'); 
  });



  </script>
</body>

</html>
