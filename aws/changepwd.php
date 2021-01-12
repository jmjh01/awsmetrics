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
              <h6 class="m-0 font-weight-bold text-info"> Change Password </h6>
            </div>
            <form id="academica" method="post" autocomplete="off" >
            <div class="card-body">
              <div class="row">
                  <div class="col-md-4">
                  </div>
                  <div class="col-md-4">
                      <div class="form-group">
                        <label for="exampleFormControlInput1"> Old Password  </label>
                        <span class="error">*</span>
                        <div class="form-group row">
                          <div class="col-sm-11 mb-3 mb-sm-0">
                        <input class="form-control" id="opwd" name="opwd" type="password" 
                        placeholder="eg. Old Password" maxlength="20" minlength="8">
                      </div>
                      <div class="col-sm-1 mb-3 mb-sm-0">
                        <div class="input-group-append">
                          <button class="btn btn-info" type="button" id="oldpwd" onclick="if (opwd.type == 'text') opwd.type = 'password';
  else opwd.type = 'text';">
                            <i class="fas fa-eye fa-sm"></i>
                          </button>
                        </div>
                      </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1"> New Password  </label>
                        <span class="error">*</span>
                        <div class="form-group row">
                          <div class="col-sm-11 mb-3 mb-sm-0">
                        <input class="form-control" id="npwd" name="npwd" type="password" 
                        placeholder="eg. New Password" maxlength="20" minlength="8">
                      </div>
                      <div class="col-sm-1 mb-3 mb-sm-0">
                        <div class="input-group-append">
                          <button class="btn btn-info" type="button" id="newpwd" onclick="if (npwd.type == 'text') npwd.type = 'password';
  else npwd.type = 'text';">
                            <i class="fas fa-eye fa-sm"></i>
                          </button>
                        </div>
                      </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1"> Confirm Password  </label>
                        <span class="error">*</span>
                        <input class="form-control" id="cpwd" name="cpwd" type="password" 
                        placeholder="eg. Confirm Password" maxlength="20" minlength="8">
                    </div>
                    <div class="alert alert-danger alert-icon" role="alert" id="addalert">
                        <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                        </button>
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
                    <button class="btn btn-success" type="button" id="addbtn" onclick="addr()">Change Password</button>
                    <button class="btn btn-warning" type="button" onclick="resetv()">Reset</button>
                </center>
              </div>
              </div>
            </div>
            <input type="hidden" id="amid" name="amid" value="12">
          </form>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php
include("footer.php");
?>

<div class="modal fade" id="alertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">After changing the password You will redirected to the login page! Are you sure to change the Password? </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
          <button class="btn btn-success" type="button" data-dismiss="modal" onclick="addrnew()">Accept</button>
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

  $("#loadingbtn").hide();
  $('#addalert').hide();

function resetv(){
  $('#opwd').val('');
  $('#npwd').val('');
  $('#cpwd').val('');
}


function addalertfun(){
      $("#addalert").show();
      $('#addalert').fadeIn('slow').delay(3000).fadeOut('slow'); 
}

function addr(){
  var opwd=$('#opwd').val();
  var str=$('#npwd').val();
  var cpwd=$('#cpwd').val();
    if(opwd=="" || opwd=="null" || str=="" || str=="null" || cpwd=="" || cpwd=="null" )
    {
       $('#errorid').html("Enter the mandatory fields!");
       addalertfun();
    }
    else if(opwd.length<=7){
        $('#errorid').html("Old Password required minimum 8 character!");
        addalertfun();
    }
    else if(npwd.length<=7){
        $('#errorid').html("New Password required minimum 8 character!");
        addalertfun();
    }
    else if(cpwd.length<=7){
        $('#errorid').html("Confirm Password required minimum 8 character!");
        addalertfun();
    }
    else if (str.length < 6) {
        $('#errorid').html("New Password is too short!");
        addalertfun();
    } else if (str.length > 50) {
        $('#errorid').html("New Password is too long!");
        addalertfun();
    } else if (str.search(/\d/) == -1) {
        $('#errorid').html("No Number in the New Password!");
        addalertfun();
    } else if (str.search(/[a-zA-Z]/) == -1) {
        $('#errorid').html("No letter in the New Password!");
        addalertfun();
    } else if (str.search(/[^a-zA-Z0-9\!\@\#\$\%\^\&\*\(\)\_\+]/) != -1) {
        $('#errorid').html("No Special character in the New Password!");
        addalertfun();
    }
    else if(str!=cpwd){
       $('#errorid').html("New Password does not match with confirm password!");
        addalertfun();
    }
    else
    {
        $("#loadingbtn").show();
        $("#addbtn").hide();
        var myform = document.getElementById("academica");
        var fd = new FormData(myform );
        $.ajax({
            url: "masterscheckalready",
            data: fd,
            cache: false,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function (dataofconfirm) {
              $("#loadingbtn").hide();
              $("#addbtn").show();
               if(dataofconfirm==2){
                    $('#errorid').html("Old Password is not correct!");
                    $('#opwd').focus();
                    $('#opwd').val('');
                    addalertfun();
               }else{
                    $('#alertModal').modal('show');
               }
            }
        });
    }
}

function addrnew(){
    queryString = "#";     
    var temp = document.forms['academica'];
    temp.action = queryString
    temp.submit();
}
  </script>
</body>
</html>
