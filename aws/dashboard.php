<?php
  include("include/connect.php");
  include("header.php");
  include("menu.php");
  if($_SESSION["isadmin"]==0)
  {
    header("Location:logout");
  }
?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
         <!-- Topbar Search -->
         
        <!-- Topbar -->
         <?php include("topbar.php");?>
        <!-- End of Topbar -->



        <!-- Begin Page Content -->
        <div class="container-fluid">
            
            <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Entry</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                  <?php 
           $r=mysqli_query($mysqli,"select count(id) as count from 
           tbl_amz_entry") or die(mysqli_error($r)); 
                    $row = mysqli_fetch_assoc($r);
                        $count = $row['count'];
                    echo $count;?>
                    
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Completed</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                         <?php 
           $r=mysqli_query($mysqli,"select count(id) as count from 
           tbl_amz_entry where file_status=2") or die(mysqli_error($r)); 
                    $row = mysqli_fetch_assoc($r);
                        $count = $row['count'];
                    echo $count;
                    ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-check-square fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">In-Progress</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"> 
                        <?php 
           $r=mysqli_query($mysqli,"select count(id) as count from 
           tbl_amz_entry where file_status=1") or die(mysqli_error($r)); 
                    $row = mysqli_fetch_assoc($r);
                        $count = $row['count'];
                    echo $count;
                    ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-circle-notch fa-spin fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xl-3 col-lg-3">
            </div>
            <!-- Area Chart -->
            <div class="col-xl-6 col-lg-6">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Classified Data</h6>
                  
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tr align="center" class="badge-dark">
                          <th>1</th>
                          <th>2</th>
                          <th>3</th>
                          <th>4</th>
                          <th>5</th>
                        
                        </tr>
                        <tr align="center">
                          <td>
                            
                          </td>
                          <td>
                            
                          </td>
                          <td>
                            
                          </td>
                          <td>
                            
                    
                   
                          </td>
                          <td>
                            
                          </td>
                        </tr>
                        
                        <div class="card-body">
                  <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tr class="badge-dark">
                          <th>Admin</th>
                          <th>Users</th>
                          <th>Entries Today</th>
                          <th>Today's Completed</th>
                          <th>Hrs Processed</th>
                        
                        </tr>
                        <tr align="center">
                          <td><?php 
                         date_default_timezone_set('Asia/Kolkata'); $currentDateTime = date('Y-m-d');
           $r=mysqli_query($mysqli,"select count(sno) as count from 
           tbl_amz_users where isadmin=1") or die(mysqli_error($r)); 
                    $row = mysqli_fetch_assoc($r);
                        $count = $row['count'];
                    echo $count;
                    ?></td>
                          <td><?php 
           $r=mysqli_query($mysqli,"select count(sno) as count from 
           tbl_amz_users where isadmin=2") or die(mysqli_error($r)); 
                    $row = mysqli_fetch_assoc($r);
                        $count = $row['count'];
                    echo $count;
                    ?></td>

                    <td><?php 
           $r=mysqli_query($mysqli,"select count(id) as count from 
           tbl_amz_entry where start_date='$currentDateTime'") or die(mysqli_error($r)); 
                    $row = mysqli_fetch_assoc($r);
                        $count = $row['count'];
                    echo $count;
                    ?></td>

                    <td><?php 
           $r=mysqli_query($mysqli,"select count(id) as count from 
           tbl_amz_entry where start_date='$currentDateTime' and file_status=2") or die(mysqli_error($r)); 
                    $row = mysqli_fetch_assoc($r);
                        $count = $row['count'];
                    echo $count;
                    ?></td>

                    <!-- <td><?php 
           $r=mysqli_query($mysqli,"SELECT SEC_TO_TIME( SUM( TIME_TO_SEC( `cdur_ms` )))  AS timeSum  
                FROM tbl_amz_entry where start_date='$currentDateTime' and file_status=2") or die(mysqli_error($r)); 
                    $row = mysqli_fetch_assoc($r);
                        $count = $row['count'];
                    echo $count;
                    ?></td> -->
                    <td>
                            
                          </td>
                       

                        
                       </table>
                     </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3">
            </div>
           
          </div>








        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
<?php
include("footer.php");
?>
  

 

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

    <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-pie-demo.js"></script>
  <script>

  $('#dashboard').addClass("active");
 
</script>
</body>

</html>
