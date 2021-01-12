<?php
  include("include/connect.php");
  include("header.php");
  include("menu.php");
?>

<link rel="stylesheet" href="custom/plugins.css">
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
              <h6 class="m-0 font-weight-bold text-info">Edit Entry </h6>
            </div>


 <form id="entry1" method="POST" autocomplete="off">
  <div class="card-body">
            <?php 
            date_default_timezone_set('Asia/Kolkata');

            $r=mysqli_query($mysqli,"select id,tid,start_date,end_date,indate,duration,dur_ms,cdur_ms,c_duration,ds_number,filetype,sub,file_status,speaker from tbl_amz_entry where id=".$_POST["id"]." ") or die(mysqli_error($r));
                        
                       while($row=mysqli_fetch_array($r))
                      {

                        $adur=$row["duration"];
                        $dur_ms=$row["dur_ms"];

                        

                        $cdur=$row["c_duration"];
                        $cdur_ms=$row["cdur_ms"];

                       
    
            ?>
           
            
              <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                          <label for="exampleFormControlSelect1">AssociateID</label>
                          <span class="error">*</span>
                          <div class="form-group row">
                          <div class="col-sm-12 mb-1 mb-sm-0">
                            <input type="text" class="form-control txtonly" id="tranid" name="tranid" placeholder="Id" maxlength="25" value="<?php echo $row["tid"]; ?>">
                           </div>
                           
                          </div>
                      </div>

                      <div class="form-group">
                         <div class="form-group row">
                          <div class="col-sm-9 mb-1 mb-sm-0">
                          <label for="exampleFormControlSelect1">Audio Duration</label>
                          <span class="error">*</span>
                          <input type="text" class="form-control txtonly" id="ad" name="ad" placeholder="HH:MM:SS" title="00:00:00" maxlength="8" value="<?php echo gmdate("H:i:s", $adur); ?>">
                        </div>
                        <div class="col-sm-3 mb-1 mb-sm-0">
                          <label for="exampleFormControlSelect1">ms</label>
                          <span class="error">*</span>
                          <input type="text" class="form-control txtonly" id="ams" name="ams" placeholder="sss" maxlength="3" value="<?php echo $row["dur_ms"]; ?>">
                        </div>
                      </div>
                      </div>                      
                      <div class="form-group">
                        <div class="form-group row">
                          <div class="col-sm-4 mb-1 mb-sm-0">
                          <label for="exampleFormControlInput1">Ingestion Date</label>
                           <div class="input-group date">
                          
                          <input type="text" id="example-datepicker3" name="indate" class="form-control input-datepicker"data-date-format="mm-dd-yyyy" placeholder="mm-dd-yyyy" tabindex="6" value="<?php echo date('m-d-Y',strtotime($row["indate"])); ?>" />
                          </div>
                         </div>
                         <div class="col-sm-4 mb-1 mb-sm-0">
                          <label for="exampleFormControlInput1">Start Date</label>
                           <div class="input-group date">
                          
                          <input type="text" id="sdate" name="sdate" class="form-control" value="<?php $currentDateTime = date('m-d-Y'); echo $currentDateTime; ?>" value="<?php echo date('m-d-Y',strtotime($row["start_date"])); ?>" readonly />
                          </div>
                         </div>
                          <div class="col-sm-4 mb-1 mb-sm-0">
                          <label for="exampleFormControlInput1">End Date</label>
                           <div class="input-group date">
                          
                          <input type="text" id="edate" name="edate" class="form-control input-datepicker"data-date-format="mm-dd-yyyy" placeholder="mm-dd-yyyy" tabindex="6" value="<?php echo date('m-d-Y',strtotime($row["end_date"])); ?>" />
                          </div>
                         </div>
                        </div>
                      </div>

                       <div class="form-group">
                          <label for="exampleFormControlSelect1">File Type/Categ</label>
                          <span class="error">*</span>
                          <select class="form-control" id="flty" name="flty" tabindex="">
                            <option value="">--Select--</option>

                            <option value="Media" <?php if ($row["filetype"]=="Media") {
                              echo "selected='selected'"; } ?>>Media</option>
                            <option value="Customer_Care" <?php if ($row["filetype"]=="Customer_Care") { echo "selected='selected'"; } ?> >Customer_Care</option>
                            <option value="Prison_Conversation" <?php if ($row["filetype"]=="Prison_Conversation") { echo "selected='selected'"; } ?>>Prison_Conversation</option>
                            <option value="Short Files" <?php if ($row["filetype"]=="Short Files") { echo "selected='selected'"; } ?>>Short Files</option>
                            <option value="Other" <?php if ($row["filetype"]=="Other") {
                              echo "selected='selected'"; } ?>>Other</option>
                          </select>
                      </div>
                     
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">File Status</label>
                        <div class="row">
                          <div class="col-md-5" style="margin-top: 14px; margin-left: 50px;">
                            <div class="radio">
                              <label>
                                <input type="radio" name="flsts" tabindex="8" value="1" <?php if ($row["file_status"]=="1") {
                              echo "checked='checked'"; } ?>>
                                Inprogress
                              </label>
                            </div>
                          </div>
                          <div class="col-md-5" style="margin-top: 14px;">
                            <div class="radio">
                              <label>
                                <input type="radio" name="flsts" tabindex="9" value="2" <?php if ($row["file_status"]=="2") {
                              echo "checked='checked'"; } ?>>
                                Completed
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="exampleFormControlSelect1">DS - Number</label>
                          <span class="error">*</span>
                          <input type="text" class="form-control txtonly" id="dsnum" name="dsnum" placeholder="DS Number" maxlength="6" value="<?php echo $row["ds_number"]; ?>">
                      </div>
                      <div class="form-group">
                         <div class="form-group row">
                          <div class="col-sm-9 mb-1 mb-sm-0">
                          <label for="exampleFormControlSelect1">Completed Duration</label>
                          <span class="error">*</span>
                          <input type="text" class="form-control txtonly" id="comdur" name="comdur" placeholder="HH:MM:SS" maxlength="8" value="<?php echo gmdate("H:i:s", $cdur); ?>">
                      </div>
                      <div class="col-sm-3 mb-1 mb-sm-0">
                          <label for="exampleFormControlSelect1">ms</label>
                          <span class="error">*</span>
                          <input type="text" class="form-control txtonly" id="cms" name="cms" placeholder="sss" maxlength="3" value="<?php echo $row["cdur_ms"]; ?>">
                        </div>
                      </div>
                    </div>
                       <div class="form-group">
                          <label for="exampleFormControlSelect1">Time</label>
                          <span class="error">*</span>
                          <input type="text" class="form-control" id="time" name="time" placeholder="Timestamp" value="<?php $currentDateTime = date('m-d-Y H:i:s'); echo $currentDateTime; ?>" readonly>
                      </div>       
                       <span id="subctg">
                      <div class="form-group">
                          <label for="exampleFormControlSelect1">Sub - Categ</label>
                          <select class="form-control" id="subcatg" name="subcatg" tabindex="12">
                            <option value="<?php echo $row["sub"]; ?>"><?php echo $row["sub"]; ?></option>
                          </select>
                      </div>
                      </span>
                      <div class="form-group">
                          <label for="exampleFormControlSelect1">Number of Speakers</label>
                          <select class="form-control" id="nospk" name="nospk" tabindex="">
                            <option value="0">No Speaker</option>

                           <option value="1" <?php if( $row["speaker"]=="1"){ echo "selected='selected'";  } ?>>1</option>
                            <option value="2" <?php if( $row["speaker"]=="2"){ echo "selected='selected'";  } ?>>2</option>
                            <option value="3" <?php if( $row["speaker"]=="3"){ echo "selected='selected'";  } ?>>3</option>
                            <option value="4" <?php if( $row["speaker"]=="4"){ echo "selected='selected'";  } ?>>4</option>
                            <option value="5" <?php if( $row["speaker"]=="5"){ echo "selected='selected'";  } ?>>5</option>
                            <option value="6" <?php if( $row["speaker"]=="6"){ echo "selected='selected'";  } ?>>6</option>
                            <option value="7" <?php if( $row["speaker"]=="7"){ echo "selected='selected'";  } ?>>7</option>
                            <option value="8" <?php if( $row["speaker"]=="8"){ echo "selected='selected'";  } ?>>8</option>
                            <option value="9" <?php if( $row["speaker"]=="9"){ echo "selected='selected'";  } ?>>9</option>
                            <option value="10" <?php if( $row["speaker"]=="10"){ echo "selected='selected'";  } ?>>10</option>
                            <option value="11" <?php if( $row["speaker"]=="11"){ echo "selected='selected'";  } ?>>10+ speakers</option> 
                          </select>
                      </div>                      
                  </div>
              </div>
              <div class="row">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-5">
                        <div class="alert alert-danger alert-icon" role="alert" id="addalert">
                           
                            <div class="alert-icon-aside" id="errorid">
                                
                            </div>
                            <div class="alert-icon-content">
                                <h6 class="alert-heading"></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                    </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                <center>
                    <button class="btn btn-success" id="loadingbtn">
                      <span class="spinner-border spinner-border-sm"></span>
                      Loading..
                    </button>
                    
                    <button class="btn btn-success" name="addbtn"id="addbtn" type="button" onclick="addr('<?php echo $row["id"]; ?>')" tabindex="21">Save</button>
                </center>
              </div>
              </div>

            <?php } ?>
               
            </div>            
            <input type="hidden" name="id" id="id" value="0">
            <input type="hidden" id="type" name="type" value="0">
          </form>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <?php include("footer.php")?>


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

  <script src="custom/jquery-2.2.4.min.js"></script>
  <script src="custom/bootstrap.min.js"></script>
  <script src="custom/plugins.js"></script>
  <script src="custom/app.js"></script>

<script type="text/javascript">
 $('#entrycreate').addClass("active");
 $('#addalert').hide();
 $('#loadingbtn').hide();

    jQuery.fn.ForceNumericOnly =
function()
{
    return this.each(function()
    {
        $(this).keydown(function(e)
        {
            var key = e.charCode || e.keyCode || 0;
            // allow backspace, tab, delete, enter, arrows, numbers and keypad numbers ONLY
            // home, end, period, and numpad decimal
            return (
                key == 8 || 
                key == 9 ||
                key == 13 ||
                key == 46 ||
                key == 110 ||
                key == 190 ||
                (key >= 35 && key <= 40) ||
                (key >= 48 && key <= 57) ||
                (key >= 96 && key <= 105));
        });
    });
};         

  function addalertfun(){
      $("#addalert").show();
       $('#addalert').fadeIn('slow').delay(3000).fadeOut('slow'); 
}
  function addr(a){
   
    if($('#tranid').val()==0  || $('#tranid').val()=="null")
    {
       $('#tranid').focus();
       $('#errorid').html("Enter the Transaction Id!");
       addalertfun();
    }
    else {
         $("#loadingbtn").show();
         $("#addbtn").hide();
         $("#id").val(a);
         $("#type").val(8);
          queryString = "mastersadd.php";     
          var temp = document.forms['entry1'];
          temp.action = queryString;
          temp.submit();
                  
    }
  }

    $(document.body).on('onload',"#flty",function (e) {
   
      $("#loadingbtn").show();
      $("#addbtn").hide();
   var optVal= $("#flty option:selected").val();
   var myform = document.getElementById("entry1");
        var fd = new FormData(myform);
        $.ajax({
            url: "entryfltyload.php",
            data: fd,
            cache: false,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function (dataofconfirm) {
             $("#loadingbtn").hide();
                $("#addbtn").show();
               if(dataofconfirm==1){
                   $('#errorid').html("Error - File Type Select  ");
                   addalertfun();
               }else{
                  $('#subctg').html(dataofconfirm);
               }
            }
        });     
});

     $(document.body).on('change',"#flty",function (e) {
  
      $("#loadingbtn").show();
      $("#addbtn").hide();
   var optVal= $("#flty option:selected").val();
   var myform = document.getElementById("entry1");
        var fd = new FormData(myform);
        $.ajax({
            url: "entryfltyload.php",
            data: fd,
            cache: false,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function (dataofconfirm) {
             $("#loadingbtn").hide();
                $("#addbtn").show();
               if(dataofconfirm==1){
                   $('#errorid').html("Error - File Type Select  ");
                   addalertfun();
               }else{
                  $('#subctg').html(dataofconfirm);
               }
            }
        });     
});

 jQuery(document).ready(function() {
    $('#alert1').fadeIn('slow').delay(3000).fadeOut('slow'); 
    $('#alert2').fadeIn('slow').delay(3000).fadeOut('slow'); 
  });

function addentry(){
    queryString = "entryadd";     
    var temp = document.forms['entry'];
    temp.action = queryString
    temp.submit();
}

function IsEmail(email) {
  var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  if(!regex.test(email)) {
    return false;
  }else{
    return true;
  }
}


</script>

</body>

</html>
