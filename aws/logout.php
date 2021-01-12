<?php
session_start();

if(isset($_SESSION["uid"]))
{
	include("include/connect.php");
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
		
	}
unset($_SESSION['uid']);	
unset($_SESSION['username']);	
unset($_SESSION['isadmin']);	

session_destroy();   
?>
<html>
<head>
<script type="text/javascript">
function LoadMe()
{
if(top!=self){
top.location=self.location;
}
location.href = "index"
}
</script>

</head>
<body onLoad="LoadMe()">

</body>
</html>
