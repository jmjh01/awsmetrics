
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>AMAZON</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
 
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">

</head>
 
<body class="bg-gradient-login">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>
                  <hr>
                  <form class="user" name="lform">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" name="exampleInputEmail"
                      id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Username...">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="exampleInputPassword"
                      id="exampleInputPassword" placeholder="Password">
                    </div>
                    
                    <button class="btn btn-primary btn-user btn-block" disabled id="loadingbtn">
                      <span class="spinner-border spinner-border-sm"></span>
                      Loading..
                    </button>
                    <a href="#" onclick="fulvalid()" id="loginbtn" class="btn btn-gold btn-user btn-block">
                      Login
                    </a>
                  <a href="../index.html" class="btn btn-primary btn-user btn-block">
                      Back
                    </a>
                    
                  </form>
                  
                 
                </div>
              </div>

            </div>
          </div>
        </div>
        <div>
          <div class="alert alert-danger alert-icon text-center h3" role="alert" id="alert-danger1">
          <button class="close" type="button" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
          </button>
          <div class="alert-icon-aside" id="error1">
            Kindly enter the mandatory fields!
          </div>
          
          </div>
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

</body>
<script>
jQuery(document).ready(function() {
   $("#alert-danger1").hide();
   $("#loadingbtn").hide();
  });

function fulvalid()
  {
    var username=$('#exampleInputEmail').val();
    var password=$('#exampleInputPassword').val();
    if(username=="" || username==null)
    {
       $("#alert-danger1").show();
       $('#alert-danger1').html("Enter Username");
       $('#alert-danger1').fadeIn('slow').delay(3000).fadeOut('slow'); 
      return false;
    }
    else if(password=="" || password==null)
    {
      $("#alert-danger1").show();

      $('#alert-danger1').html("Enter Password");
      $('#alert-danger1').fadeIn('slow').delay(3000).fadeOut('slow');  
      return false;
    }
    else
    {
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
                      $('#exampleInputEmail').val('');
                      $('#exampleInputPassword').val('');
                      $('#exampleInputEmail').focus();
                      $("#alert-danger1").show();
                      $('#alert-danger1').html("Invalid Username and Password");
                      $('.alert-danger1').fadeIn('slow').delay(3000).fadeOut('slow');
                  }
                  else if(xmlhttp.responseText =="0")
                  {
                    $("#alert-danger1").show();
                    $('#alert-danger1').html('Required parameter is not set!');
                     $('#alert-danger1').fadeIn('slow').delay(3000).fadeOut('slow'); 
                  }
                  
                  else if(xmlhttp.responseText =="2"){
                      window.location.href='dashboard';
                  }
                  else{
                    $('#exampleInputEmail').val('');
                    $('#exampleInputPassword').val('');
                    $('#exampleInputEmail').focus();
                    $('#alert-danger1').html("OOPS! Something problem!");
                    $('#alert-danger1').fadeIn('slow').delay(3000).fadeOut('slow');
                    
                  }
            }
        }
        xmlhttp.open("GET","checklogin?un="+username+"&pwd="+password,true);

        xmlhttp.send();
    }
   
  }
</script>
</html>
