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
         <?php include("topbar.php");?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-warning">Entry View</h6>
                <a class="btn btn-success btn-sm btn-icon-split pullright" href="#" data-toggle="modal" data-target="#deleteall">

                    <span class="icon text-white-50">
                      <i class="fas fa-trash"></i>
                    </span>
                    <span class="text" data-toggle="tooltip" data-placement="top">Delete All</span>
                  </a>
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered dt-responsive nowrap" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr class="badge-warning">
                      <!--<th>S.No</th>-->
                      <th>Associate Id</th>
                      <th>Audio_Dura</th>
                      <!-- <th>Audio_Dura(in mins)</th> -->
                      <th>Audio_Dura(in secs)</th>

                      
                      <th>Comp_Duartion</th>
                      <!-- <th>Comp_Duartion(in mins)</th> -->
                      <th>Comp_Duartion(in secs)</th>
                     
                      <th>DS_Number</th>
                      <th>Status</th>
                      <th>Start date</th>
                      <th>Entry Date</th>
                     
                      <th>End Date</th>
                      <th>Assigned At :</th>
                      <th>Completed At :</th>
                      <th>Ingestion Date -></th>
                      <th>Aeging =</th>
                       <th>Total Days Processed =</th>
                      
                      <th>File Type -> </th>
                      <th>Sub-categ -> </th>
                      <th>Speakers = </th>
                      <th>Options</th>
                    </tr>
                  </thead>
                  <tbody>
                     <?php 
                        $r=mysqli_query($mysqli,"select * from tbl_amz_entry") or die(mysqli_error($r));
                        $a=1;
                       while($row_a=mysqli_fetch_array($r))
                      {
                        $adur=$row_a["duration"];
                        $dur_ms=$row_a["dur_ms"];
                                              
                        $cdur=$row_a["c_duration"];
                        $cdur_ms=$row_a["cdur_ms"];
                        
                      

                        
  $date1=$row_a["start_date"];
  $date2=$row_a["end_date"];
  $date3=$row_a['indate'];

  //$diff = abs(strtotime($date2) - strtotime($date1));
//$days = floor($diff/(60*60*24));
if ($date2=="0000-00-00") {
  $agdays=0;

}

else
{
  $agdiff = abs(strtotime($date2) - strtotime($date3));
$agdays = floor($agdiff/(60*60*24));
 
}

$workingDays = 0;
 
$startTimestamp = strtotime($date1);
$endTimestamp = strtotime($date2);
 
for($i=$startTimestamp; $i<=$endTimestamp; $i = $i+(60*60*24) ){
if(date("N",$i) <= 5) $workingDays = $workingDays + 1;
}


// Calculates the difference between DateTime objects 
//$interval = date_diff($a,$b); 
  
// Display the result 
//echo $interval->format('Difference between two dates: %R%a days');

                       

                      ?>
                       <tr>
                      <!--  <td><?php //echo $a;?></td> -->
                        <td><?php echo $row_a['tid'];?></td>
                        <td><?php echo gmdate("H:i:s", $adur).".".$row_a['dur_ms'];?></td>
                 
                        <!-- <td><?php echo $row_a[$durationmin];?></td> -->
                        <td><?php echo $row_a['duration'];?></td>
                        <td><?php echo gmdate("H:i:s", $cdur).".".$row_a['cdur_ms'];?></td>
                        <!-- <td><?php echo $row_a[$c_durationmin];?></td> -->

                        <td><?php echo $row_a['c_duration'];?></td>
            
                        <td><?php echo $row_a['ds_number']?></td>
                        <td><?php if ($row_a['file_status']==1){?><span class="badge badge-warning badge-pill">Inprogress</span>
                        <?php }else{?>
                          <span class="badge badge-success badge-pill">completed</span>
                        <?php } ?>
                        </td>
                        <td><?php echo $row_a['start_date'];?></td>
                        <td><?php echo substr ($row_a['comptime'],0,10);?></td>

                        <td><?php echo $row_a['end_date'];?></td>
                        <td><?php echo substr($row_a['time'],10,10);?></td>
                        <td><?php echo $row_a['comptime'];?></td>

                       
                        <td><?php echo $row_a['indate'];?></td>
                        <td><?php echo $agdays;?> Days</td>
                        <td><?php echo $workingDays;?> Days</td>
                        <td><?php echo $row_a['filetype'];?></td>
                        <td><?php echo $row_a['sub'];?></td>
                        <td><?php echo $row_a['speaker'];?></td>
                        <td>
                          <span class="badge badge-warning badge-pill cursorpoint"  onClick="editentry('<?php echo $row_a['id']; ?>');" ><i class="fas fa-edit fa-fw"></i> Edit</span>
                         
                          <span class="badge badge-danger badge-pill cursorpoint" data-toggle="modal" data-target="#delete" onClick="deleteentry('<?php echo $row_a['id']; ?>');" ><i class="fas fa-trash fa-fw"></i> Delete</span>
                        </td>
                      </tr>
                   <?php 
                    $a++;
                      }
                     
                       $no_rows=mysqli_num_rows($r);
                       if($no_rows==0){
                         ?>
                       
                        <tr><td colspan="10"><center>No Records found.</center></td></tr>
                        <?php
                      }
                      ?>
                    
                  </tbody>
                </table>
              </div>

               <form id="entry" method="POST" autocomplete="off">
                  <input type="hidden" name="id" id="id">
                  <input type="hidden" id="type" name="type" value="0">
              </form>


            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
<?php
include("footer.php");
?>
 
  <div class="modal fade" id="deleteall" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete  All</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Are you sure to delete all the entry?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="#" onclick="daioper1()">Confirm</a>
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
  <script src="vendor/datatables/dataTables.buttons.min.js"></script>
    <script src="vendor/datatables/buttons.bootstrap4.min.js"></script>
    <script src="vendor/datatables/jszip.min.js"></script>
    <script src="vendor/datatables/pdfmake.min.js"></script>
    <script src="vendor/datatables/vfs_fonts.js"></script>
    <script src="vendor/datatables/buttons.html5.min.js"></script>
    <script src="vendor/datatables/buttons.print.min.js"></script>
    <script src="vendor/datatables/buttons.colVis.min.js"></script>
    <script src="vendor/datatables/dataTables.responsive.min.js"></script>
    <script src="vendor/datatables/responsive.bootstrap4.min.js"></script>
  <script>

  $('#entryview').addClass("active");
  var table = $('#dataTable').DataTable(
              {
                  lengthChange: false,
                  buttons: [ 'copy', 'excel', 'csv', 'pdf']
              });
           
              table.buttons().container()
                  .appendTo( '#dataTable_wrapper .col-md-6:eq(0)' );

jQuery(document).ready(function() {
    $('#alert1').fadeIn('slow').delay(3000).fadeOut('slow'); 
    $('#alert2').fadeIn('slow').delay(3000).fadeOut('slow'); 
    $('#alert3').fadeIn('slow').delay(3000).fadeOut('slow'); 
  });

function deleteentry(a){
    $("#id").val(a);
    $("#type").val(3);
    dlt();
}

function dlt(){              
      queryString = "mastersadd.php";     
      var temp = document.forms['entry'];
      temp.action = queryString
      temp.submit();
     }

function editentry(a){
      $("#id").val(a);
    queryString = "entryedit.php";     
      var temp = document.forms['entry'];
      temp.action = queryString
      temp.submit();
}

function daioper1(){          
      $("#type").val(7);    
      queryString = "mastersadd.php";     
      var temp = document.forms['entry'];
      temp.action = queryString
      temp.submit();
     }

</script>
</body>

</html>



