<?php
  include("include/connect.php");
?>
<!DOCTYPE html>
<html lang="en">

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
           <div class="form-group">
                    <label for="exampleFormControlSelect1">Transcriber ID</label>
                    <span class="error">*</span>
                    <div class="form-group row">
                    <div class="col-sm-3 mb-1 mb-sm-0">
                      <input type="text" class="form-control txtonly" id="tranid" name="tranid" autofocus placeholder="Id" maxlength="25">
                     </div>
                     <div class="col-sm-3 mb-1">
                      <button type="button" class="btn btn-success btn-md btn-icon-split pullright"
                      onclick="searchfun()" id="searchbtn">
                            <span class="icon text-white-50">
                              <i class="fas fa-arrow-right"></i>
                            </span>
                          <span class="text" data-toggle="tooltip" data-placement="top">Fetch ALL</span>
                        </button>
                     </div>
                     <div class="col-md-6">
                      <div class="alert alert-danger" id="errorid">
                          
                      </div>
                     </div>
                    </div>
            </div>
      <div class="card-body">
        <div class="row" id="row1" >
        <div class="col-md-6">
          <div class="form-group row">
                <div class="col-sm-9 mb-1 mb-sm-0">
                <label for="exampleFormControlSelect1">Audio Duration</label>
                <span class="error">*</span>
                <input type="text" class="form-control" id="ad" name="ad" placeholder="HH:MM:SS"title="00:00:00" maxlength="8" >
              </div>
              <div class="col-sm-3 mb-1 mb-sm-0">
                <label for="exampleFormControlSelect1">Ms</label>
                <span class="error">*</span>
                <input type="text" class="form-control" id="ams" name="ams" placeholder="MMM" title="000" maxlength="3" >
              </div>
            </div>                      
            <div class="form-group">
              <div class="form-group row">
                <div class="col-sm-4 mb-1 mb-sm-0">
                <label for="exampleFormControlInput1">Ingestion Date</label>
                 <div class="input-group date">
                
                <input type="text" id="indate" name="indate" class="form-control input-datepicker" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" tabindex="6" />

                </div>
               </div>
               <div class="col-sm-4 mb-1 mb-sm-0">
                <label for="exampleFormControlInput1">Start Date</label>
                 <div class="input-group date">
                
                <input type="text" id="sdate" name="sdate" class="form-control" value="<?php date_default_timezone_set('Asia/Kolkata'); $currentDateTime = date('d-m-Y'); echo $currentDateTime; ?>" readonly />
                </div>
               </div>
              </div>
            </div>

            <div class="form-group">
              <label for="exampleFormControlSelect1">File Status</label>
              <div class="row">
                <div class="col-md-5" style="margin-top: 14px; margin-left: 50px;">
                  <div class="radio">
                    <label>
                      <input type="radio" id="flsts" name="flsts" tabindex="8" value="1" checked>
                      Inprogress
                    </label>
                  </div>
                </div>
                <div class="col-md-5" style="margin-top: 14px;">
                  <div class="radio">
                    <label>
                      <input disabled type="radio" id="flsts" name="flsts" tabindex="9" value="2">
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
                <input type="text" class="form-control txtonly" id="dsnum" name="dsnum" placeholder="DS Number" minlength="5" maxlength="6">
            </div>
            
            <div class="form-group">
                <label for="exampleFormControlSelect1">Time</label>
                <span class="error">*</span>
                <input type="text" class="form-control" id="time" name="time" placeholder="Timestamp" value="<?php $currentDateTime = date('Y-m-d H:i:s'); echo $currentDateTime; ?>" readonly>
            </div>       
            
        </div>
    </div>
 
    <div id="row3" class="row">
      <div class="col-md-12">
      <center>
          <button class="btn btn-success" id="loadingbtn">
            <span class="spinner-border spinner-border-sm"></span>
            Loading..
          </button>
          
          <button class="btn btn-success" name="addbtn"id="addbtn" type="button" onclick="addr()" tabindex="21">Save</button>
          <button class="btn btn-success" name="updtbtn"id="updtbtn" type="button" onclick="editfun()" tabindex="">Update</button>
          <button class="btn btn-warning" type="button" tabindex="22" onclick="treset()">Reset</button>
      </center>
    </div>
    </div>
</div>
            <input type="hidden" name="test1" id="test1" >
            <input type="hidden" name="type" id="type" value="0">
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

<script>
  document.addEventListener("DOMContentLoaded", function (event) {
     navActivePage();
  });
</script>

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
   $("#errorid").hide();
   $("#loadingbtn").hide();
   $("#row1").hide();
   $("#row2").hide();
   $("#row3").hide();
  });

var $regexname=/^([01][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])(?:\\.([0-9]{1,3}))?$/;
$('#ad').on('blur',function(){
     if (!$(this).val().match($regexname)) {
      $('#errorid').html("Format not matched HH:MM:SS(eg:23:59:59)");
       addalertfun();
     }
 });


function addalertfun(){
  $("#addalert").show();
  $('#addalert').fadeIn('slow').delay(3000).fadeOut('slow'); 
}

$(document).keypress(function (e) {
    if (e.which == 13) {
      searchfun();
    return false;
    }
});

   function searchfun() {
    var tid=$('#tranid').val();
    $('#test1').val($('#tranid').val());
    if($('#tranid').val()==0 || $('#tranid').val()==null)
    {
     $('#tranid').focus();
     $('#errorid').html("Enter the Transcriber Id!");
     addalertfun();
     $("#row1").hide();
     $("#row2").hide();
     return false;
    }
    else{
        $("#loadingbtn").show();
        $("#loginbtn").hide();
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                $("#loginbtn").show();
                $("#loadingbtn").hide();
                  if(xmlhttp.responseText =="1"){
                  // alert("2");
                  $("#errorid").show();
                  $("#errorid").show();
                  $('#row1').hide();
                  $('#row2').hide();
                  $('#row3').hide();
                  $('#errorid').html("Transcriber Id Not Found Contact Admin..!");
                  addalertfun();
                  return true;
                  }
                  else if(xmlhttp.responseText =="0")
                  {
                  $("#errorid").show();
                  $('#row1').hide();
                  $('#row2').hide();
                  $('#row3').hide();
                  addalertfun();
                  // alert("3");
                   $('#errorid').html("NOT VALID ENTRY!");
                  }                  
                  else if(xmlhttp.responseText =="2"){
                     // $("#errorid").show();
                     // $('#errorid').html("New!");
                     $('#row1').show();
                     $('#row2').hide();
                     $('#row3').show();
                     $('#addbtn').show();
                     $('#updtbtn').hide();
                     
                  }
                  else if(xmlhttp.responseText =="3"){
                      queryString = "datracker.php";     
                      var temp = document.forms['entry'];
                      temp.action = queryString;
                      temp.submit();      
                     // window.location.href='datracker.php';
                  }
                  else{
                     $('#errorid').html("Contact Admin!");
                     $("#errorid").show();
                     $('#row1').hide();
                     $('#row2').hide();
                     $('#row3').hide();
                     addalertfun();  
                  }
            }
        }
        xmlhttp.open("GET","entrycheck.php?tid="+tid,true);
        xmlhttp.send();
      }
    }

function addalertfun(){
  $("#errorid").show();
  $('#errorid').fadeIn('slow').delay(3000).fadeOut('slow'); 
}

function treset(){
    $('#ad').val('');
    $('#ams').val('');
    $('#indate').val('');
    $('#dsnum').val('');
  }
  function addr(){
    $('#type').val(1);
    if($('#tranid').val()==0  || $('#tranid').val()==null)
    {
       $('#tranid').focus();
       $('#errorid').html("Enter the Transcriber Id!");
       addalertfun();
    }
    else if($('#ad').val()=="" || $('#ad').val()==null){
       $('#ad').focus();
       $('#errorid').html("Enter the Audio Duration!");
       addalertfun();
    }
    else if($('#indate').val()=="" || $('#indate').val()==null){
       $('#indate').focus();
       $('#errorid').html("Choose a Ingestion date!");
       addalertfun();
    }
    
    else if($('#dsnum').val()=="" || $('#dsnum').val()==null || $('#dsnum').val()<5 || $('#dsnum').val()>6){
       $('#dsnum').focus();
       $('#errorid').html("Enter the DS Number!");
       addalertfun();
    }
    else {
         $("#loadingbtn").show();
         $("#addbtn").hide();
          queryString = "mastersadd.php";     
          var temp = document.forms['entry'];
          temp.action = queryString;
          temp.submit();          
    }
  }

function editfun(){
 $("#loadingbtn").show();
 $("#addbtn").hide();
 $("#type").val(2);
  queryString = "mastersadd.php";     
  var temp = document.forms['entry'];
  temp.action = queryString;
  temp.submit();
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