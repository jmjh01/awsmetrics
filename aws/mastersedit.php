<!-- Change Password -->
<?php
include("include/connect.php");
session_start();
$_SESSION['login_time'] = time();
// mysqli_query($mysqli,"insert into tbl_log values () 
//              where col=value") or die(mysqli_error($mysqli));
if(isset($_POST["umid"]))
{

    date_default_timezone_set("Asia/Calcutta");

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

	if($_POST["#"]==1)
	{
			
			mysqli_query($mysqli,"update tbl set col=value
			 where col=value") or die(mysqli_error($mysqli));
			echo "<script>window.location.href='index'</script>";
	}
else
{
	echo "Error";
}
?>