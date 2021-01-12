<?php
session_start();
if(!isset($_SESSION["uid"]))
{
   echo "<script type=text/javascript>window.location='index';</script>";
}else if(time() - $_SESSION['login_time'] > 1200)
{
    header("Location:logout");
}else{
    $_SESSION['login_time'] = time();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Amazon</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.css" rel="stylesheet" type="text/css">
  
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">
  <link href="css/bootstrap-datetimepicker.css" rel="stylesheet">
  <link rel="shortcut icon" href="img/aws.png">
  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <link rel="stylesheet" href="css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="css/responsive.bootstrap4.min.css">


</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
