<!DOCTYPE html>
<html lang="en">
<?php
  include("include/connect.php");
?>

<head>
  <meta charset="UTF-8">
  <meta content="IE=edge" http-equiv="X-UA-Compatible">
  <meta content="width=device-width,initial-scale=1" name="viewport">
  <meta content="description" name="description">
  <meta name="google" content="notranslate" />

  <!-- Disable tap highlight on IE -->
  <meta name="msapplication-tap-highlight" content="no">

  <title>Task Details</title>  

<link href="./main.css" rel="stylesheet">
<link href="./aws/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="site-border-left"></div>
<div id="site-border-right"></div>
<div id="site-border-top"></div>
<div id="site-border-bottom"></div>
 <!-- Add your content of header -->
<header>
  <nav class="navbar  navbar-fixed-top navbar-default">
    <div class="container">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>


      <div class="collapse navbar-collapse" id="navbar-collapse">
        <ul class="nav navbar-nav ">
          <li><a href="index.html" title="">Home</a></li>
          <li><a class="active" href="taskentry.php" title="">Task Entry</a></li>
          <li><a href="./aws/index.php" title="">Admin</a></li>
        </ul>


      </div> 
    </div>
  </nav>
</header>
 
<div class="section-container">
    <div class="container">
      <div class="row">
      <a class="navbar-brand" href="./index.html" title="">
          <img src="./assets/images/index.png"  alt="Velocity Metrics">
        </a>
          
        <div class="col-xs-12">
          <div class="section-container-spacer text-center">

            <h1 class="h2">AWS Tracker</h1>
            
          </div>
          <form id="entry" method="post" autocomplete="off">
            <div class="card-body">
              
            <div class="row">

      <?php 
            date_default_timezone_set('Asia/Kolkata');

            $r = mysqli_query($mysqli,"select id,tid,start_date,end_date,indate,duration,dur_ms,c_duration,cdur_ms,ds_number,filetype,sub,file_status,speaker from tbl_amz_entry where tid='".$_POST["test1"]."' order by id desc limit 1") or die(mysqli_error($r));
                        
                     while($row=mysqli_fetch_array($r))
                      {

                        $adur=$row["duration"];
                        
                        
                        $ams=$row["dur_ms"];
                        if ($ams==0)
                        {
                          $ams=str_pad($ams,3,0,STR_PAD_LEFT);
                        }

                        $cdur=$row["c_duration"];
                                                
                        $cms=$row["cdur_ms"];
                        if ($cms==0)
                        {
                          $cms=str_pad($cms,3,0,STR_PAD_LEFT);
                        }
                        
            ?>  
            <div class="alert alert-danger" id="errorid">
                          
                      </div>
                  <div class="col-md-6">

                    <div class="form-group">
                          <label for="exampleFormControlSelect1">Transcriber ID</label>
                          <span class="error">*</span>
                          <div class="form-group row">
                          <div class="col-sm-12 mb-1 mb-sm-0">
                            <input type="text" class="form-control txtonly" id="tranid" name="tranid" placeholder="Id" maxlength="25" value="<?php echo $_POST['test1']; ?>" readonly>
                           </div>
                          
                          </div>
                      </div>

                      <div class="form-group">
                         <div class="form-group row">
                          <div class="col-sm-9 mb-1 mb-sm-0">
                            <label for="exampleFormControlSelect1">Audio Duration</label>
                            <span class="error">*</span>
                            <input readonly type="text" class="form-control txtonly" id="ad" name="ad" placeholder="HH:MM:SS:sss" pattern="([01][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])(:|\.)\d{3}" title="00:00:00" minlength="8" maxlength="8" value="<?php echo gmdate("H:i:s", $adur);  ?>">
                            
                          </div>
                          <div class="col-sm-3 mb-1 mb-sm-0">
                            <label for="exampleFormControlSelect1">Ms</label>
                            <span class="error">*</span>
                            <input readonly type="text" class="form-control" id="ams" name="ams" placeholder="MMM" title="000" maxlength="3" value="<?php echo $ams; ?>">
                          </div>
                        </div>
                      </div>                      
                      <div class="form-group">
                        <div class="form-group row">
                          <div class="col-sm-4 mb-1 mb-sm-0">
                          <label for="exampleFormControlInput1">Ingestion Date</label>
                           <div class="input-group date">
                          
                          <input type="text" readonly id="example-datepicker3" name="indate" class="form-control"data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" tabindex="6" value="<?php echo date('d-m-Y',strtotime($row["indate"])); ?>" />
                          </div>
                         </div>
                         <div class="col-sm-4 mb-1 mb-sm-0">
                          <label for="exampleFormControlInput1">Start Date</label>
                           <div class="input-group date">
                          
                          <input type="text" id="sdate" name="sdate" class="form-control" value="<?php echo date('d-m-Y',strtotime($row["start_date"])); ?>" readonly />
                          </div>
                          
                         </div>
                          <div class="col-sm-4 mb-1 mb-sm-0">
                          <label for="exampleFormControlInput1">End Date</label>
                           <div class="input-group date">
                          
                          <input type="text" id="edate" name="edate" class="form-control"data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" tabindex="6" value="<?php $currentDateTime = date('d-m-Y'); echo $currentDateTime;?>" readonly/>
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
                          <input type="text" readonly class="form-control txtonly" id="dsnum" name="dsnum" placeholder="DS Number" minlength="5" maxlength="6" value="<?php echo $row["ds_number"]; ?>">
                      </div>
                     <div class="form-group row">
                        <div class="col-sm-9 mb-1 mb-sm-0">
                       <label for="exampleFormControlSelect1">Completed Duration</label>
                                  <span class="error">*</span>
                                  <input type="text" class="form-control txtonly" id="comdur" name="comdur" placeholder="HH:MM:SS" title="00:00:00" minlength="8" maxlength="8" value="<?php echo gmdate("H:i:s", $cdur);?>">
                      </div>
                      <div class="col-sm-3 mb-1 mb-sm-0">
                        <label for="exampleFormControlSelect1">Ms</label>
                        <span class="error">*</span>
                        <input type="text" class="form-control" id="cms" name="cms" placeholder="000" title="MMM" maxlength="3" value="<?php echo $cms; ?>">
                      </div>
                    </div> 
                      <div class="form-group">
                          <label for="exampleFormControlSelect1">Time</label>
                          <span class="error">*</span>
                          <input type="text" class="form-control" id="time" name="time" placeholder="Timestamp" value="<?php $currentDateTime = date('Y-m-d H:i:s'); echo $currentDateTime; ?>" readonly>
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
                      <option value="10" <?php if( $row["speaker"]=="10"){ echo "selected='selected'";  } ?>>10+</option>
                      <option value="11" <?php if( $row["speaker"]=="11"){ echo "selected='selected'";  } ?>>No speakers</option> 
                    </select>
                </div>                      
                  </div>
                  <?php } ?>
                           
           </div>

              <div class="row">
                <div class="col-md-12">
                <center>
                    <button class="btn btn-success" id="loadingbtn">
                      <span class="spinner-border spinner-border-sm"></span>
                      Loading..
                    </button>

                    <a class="btn btn-warning" href="taskentry.php" name="back" id="back" tabindex="21">Back</a>
                    <button class="btn btn-success" name="addbtn"id="addbtn" type="button" onclick="addr()" tabindex="21">Update</button>
                   
                </center>
              </div>
              </div>
               
            </div>
            <input type="hidden" id="type" name="type" value="0">
          </form>
        </div>
      </div>
    </div>
  </div>


<footer class="footer-container text-center">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <p>© Copyright Amazon Web services | Amazon Confidential <br></p>
        <p><a href="https://adscentral.corp.amazon.com" title="ADS Central">ADSC</a>/<a href="https://atat.amazon.com/" title="ATAT">ATAT</a></p>
      </div>
    </div>
  </div>
</footer>




<!-- Bootstrap core JavaScript-->
  <script src="./aws/vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="./aws/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="./aws/js/sb-admin-2.min.js"></script>
  <script src="./aws/js/bootstrap-datepicker.js"></script>
 

  <!-- Page level plugins -->
  <script src="./aws/vendor/datatables/jquery.dataTables.js"></script>
  <script src="./aws/vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Page level custom scripts -->
  <script src="./aws/js/demo/datatables-demo.js"></script>

  <script src="./aws/custom/jquery-2.2.4.min.js"></script>
  <script src="./aws/custom/bootstrap.min.js"></script>
  <script src="./aws/custom/plugins.js"></script>
  <script src="./aws/custom/app.js"></script>

 
 </body>
<script type="text/javascript">
   jQuery(document).ready(function() {
   $("#addalert").hide();
   $("#errorid").hide();
   $("#loadingbtn").hide();
   var $regexname=/^([01][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])(?:\\.([0-9]{1,3}))?$/;
  $('#comdur').on('blur',function(){
       if (!$(this).val().match($regexname)) {
        $("#errorid").show();
        $('#errorid').html("Format not matched HH:MM:SS(eg:23:59:59)");
         addalertfun();
       }
   });

  });

function addalertfun(){
      $("#addalert").show();
      $('#addalert').fadeIn('slow').delay(3000).fadeOut('slow'); 
}
function treset(){
    $('#comdur').val('');
    $('#cms').val('');
    $('#flty').val('');
    $('#subcatg').val('');
    $('#nospk').val('');
}

  function addr(){
   
    if($('#tranid').val()==0  || $('#tranid').val()==null)
    {
       $('#tranid').focus();
       $('#errorid').html("Enter the Transcriber Id!");
       addalertfun();
    }
        // else if($('#ad').val()=="" || $('#ad').val()==null){
        // $('#ad').focus();
        // $('#errorid').html("Enter the Audio Duration!");
        // addalertfun();
     //}
     // else if($('#indate').val()=="" || $('#indate').val()==null){
     //    $('#indate').focus();
     //    $('#errorid').html("Choose a Ingestion date!");
     //    addalertfun();
     // }
     // else if($('#flty').val()=="" || $('#flty').val()==null){
     //    $('#flty').focus();
     //    $('#errorid').html("Select a File type!");
     //    addalertfun();
     // }
     // else if($('#flsts').val()=="" || $('#flsts').val()==null){
     //    $('#flsts').focus();
     //    $('#errorid').html("Choose a File Status!");
     //    addalertfun();
     // }
     // else if($('#dsnum').val()=="" || $('#dsnum').val()==null){
     //    $('#dsnum').focus();
     //    $('#errorid').html("Enter the DS Number!");
     //    addalertfun();
     // }
     // else if($('#comdur').val()=="" || $('#comdur').val()==null){
     //    $('#comdur').focus();
     //    $('#errorid').html("Enter the Completed Duration!");
     //    addalertfun();
     // }
     // else if($('#subcatg').val()=="" || $('#subcatg').val()==null){
     //    $('#subcatg').focus();
     //    $('#errorid').html("Choose a Sub Catg!");
     //    addalertfun();
     // }
     // else if($('#nospk').val()=="0" || $('#nospk').val()==null){
     //    $('#nospk').focus();
     //    $('#errorid').html("Choose a Number of Speakers!");
     //    addalertfun();
     // }
     // else if($('#sdate').val()>=$('#edate').val() || $('#edate').val()=="null"){
     //    $('#edate').focus();
     //    $('#errorid').html("Choose a End Date!");
     //    addalertfun();
     // }
    else {
         $("#loadingbtn").show();
         $("#addbtn").hide();
         $('#type').val(2)
          queryString = "mastersadd.php";     
          var temp = document.forms['entry'];
          temp.action = queryString;
          temp.submit();
                  
    }
  }

     $(document.body).on('change',"#flty",function (e) {
   
      $("#loadingbtn").show();
      $("#addbtn").hide();
   var optVal= $("#flty option:selected").val();
   var myform = document.getElementById("entry");
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

</script>
</html>