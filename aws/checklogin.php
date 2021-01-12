<?php
	include("include/connect.php");
	if(isset($_GET["un"]) && isset($_GET["pwd"]))
	{
		$result=mysqli_query($mysqli,"select * from tbl_amz_users where empid='".$_GET["un"]."' and admin_password='".$_GET["pwd"]."'");
		if (!$result) {
		    printf("Error: %s\n", mysqli_error($mysqli));
		    exit();
		}
		$ar1=mysqli_fetch_array($result);
		$no_rows=mysqli_num_rows($result);
		if($no_rows==1)
		{
			if($ar1["isadmin"]=="1"){
				session_start();
				$_SESSION["uid"]=$ar1["empid"];
				$_SESSION["username"]=$ar1["empname"];
				$_SESSION["isadmin"]=$ar1["isadmin"];
				$_SESSION['login_time'] = time();
				if (isset($_SERVER['HTTP_CLIENT_IP']))
			        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
			    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
			        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
			    else if(isset($_SERVER['HTTP_X_FORWARDED']))
			        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
			    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
			        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
			    else if(isset($_SERVER['HTTP_FORWARDED']))
			        $ipaddress = $_SERVER['HTTP_FORWARDED'];
			    else if(isset($_SERVER['REMOTE_ADDR']))
			        $ipaddress = $_SERVER['REMOTE_ADDR'];
			    else
			        $ipaddress = 'UNKNOWN';
				
				if($_SESSION["isadmin"]==1)
				{
					echo "2";
				}else{
					echo "4";
				}
			}else{
				echo "3";
			}
		}
		else
		{
			echo "1";
		}
	}else{
		echo "0";
	}
$mysqli -> close();
?>