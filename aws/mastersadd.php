<?php
include("include/connect.php");


if ($_POST["type"] =="1"){
	date_default_timezone_set('Asia/Kolkata');
	$adur=$_POST["ad"];
	$adv=preg_split('#(?<!\\\)\:#',$adur);
	$ams=$_POST["ams"];
	$ad = ($adv[0]*3600)+($adv[1]*60)+($adv[2]*1);
	
	$in=date('Y-m-d',strtotime($_POST["indate"]));
	$s=date('Y-m-d',strtotime($_POST["sdate"]));
	

	mysqli_query($mysqli,"insert into tbl_amz_entry(tid,duration,dur_ms,ds_number,indate,start_date,file_status) 
	values ('".$_POST["tranid"]."',".$ad.",".$ams.",'".$_POST["dsnum"]."','".$in."','".$s."',".$_POST["flsts"].")") or die(mysqli_error($mysqli));
		echo "<script>alert('success');</script>";

		echo "<script>window.location.href='taskentry.php'</script>";
}elseif ($_POST["type"]=="2") {

	$adur=$_POST["ad"];
	$adv=preg_split('#(?<!\\\)\:#',$adur);
	$ams=$_POST["ams"];
	$ad = ($adv[0]*3600)+($adv[1]*60)+($adv[2]*1);
	
	$com = $_POST["comdur"];
	$comv=preg_split('#(?<!\\\)\:#',$com);
	$cms=$_POST["cms"];
	$comdur = ($comv[0]*3600)+($comv[1]*60)+($comv[2]*1);
	
	$in=date('Y-m-d',strtotime($_POST["indate"]));
	$s=date('Y-m-d',strtotime($_POST["sdate"]));
	$e=date('Y-m-d',strtotime($_POST["edate"]));
	$currentDateTime = date('Y-m-d H:i:s'); 
	mysqli_query($mysqli,"update tbl_amz_entry set duration=".$ad.",dur_ms=".$ams.",ds_number='".$_POST["dsnum"]."',c_duration='".$comdur."',cdur_ms='".$cms."',indate = '".$in."',filetype='".$_POST["flty"]."',sub='".$_POST["subcatg"]."',file_status='".$_POST["flsts"]."',speaker=".$_POST["nospk"].",start_date = '".$s."',comptime = '".$currentDateTime."',end_date = '".$e."' where tid = '".$_POST["tranid"]."' order by id desc limit 1 ")or die(mysqli_error($mysqli));
	echo "<script>alert('Record Updated Successfully');</script>";

	echo "<script>window.location.href='taskentry.php'</script>";
}elseif ($_POST["type"]=="3") {

	mysqli_query($mysqli,"delete from tbl_amz_entry where id=".$_POST["id"]."")or die(mysqli_error($mysqli));
	echo "<script>alert('Record Deleted Successfully');</script>";

	echo "<script>window.location.href='entryview.php'</script>";
	
}elseif ($_POST["type"]=="4") {

	mysqli_query($mysqli,("insert into tbl_amz_users (empid,empname,isadmin,tid) values('".$_POST["empid"]."','".$_POST["empname"]."',".$_POST["role"].",'".$_POST["tid"]."')"))or die(mysqli_error($mysqli));

	echo "<script>window.location.href='viewusers.php'</script>";
}elseif ($_POST["type"]=="5") {

	mysqli_query($mysqli,"update tbl_amz_users set empname='".$_POST["empname"]."', isadmin = ".$_POST["role"].", tid = '".$_POST["tid"]."' where empid = '".$_POST["editid"]."' ")or die(mysqli_error($mysqli));
	echo "<script>alert('Record Updated Successfully');</script>";

	echo "<script>window.location.href='viewusers.php'</script>";
}elseif ($_POST["type"]=="6") {
	
	mysqli_query($mysqli,("update tbl_amz_users set isdelete=1 where empid = '".$_POST["editid"]."' "))or die(mysqli_error($mysqli));
	echo "<script>alert('Record Deleted Successfully');</script>";

	echo "<script>window.location.href='viewusers.php'</script>";
}elseif ($_POST["type"]=="7") {
	
	mysqli_query($mysqli,("delete from tbl_amz_entry"))or die(mysqli_error($mysqli));
	echo "<script>alert(' ALL Record Deleted Successfully');</script>";

	echo "<script>window.location.href='entryview.php'</script>";
}elseif ($_POST["type"]=="8") {

	$adur=$_POST["ad"];
	$adv=preg_split('#(?<!\\\)\:#',$adur);
	$ams=$_POST["ams"];
	$ad = ($adv[0]*3600)+($adv[1]*60)+($adv[2]*1);
	
	$com = $_POST["comdur"];
	$comv=preg_split('#(?<!\\\)\:#',$com);
	$cms=$_POST["cms"];
	$comdur = ($comv[0]*3600)+($comv[1]*60)+($comv[2]*1);
	
	$in=date('Y-m-d',strtotime($_POST["indate"]));
	$s=date('Y-m-d',strtotime($_POST["sdate"]));
	$e=date('Y-m-d',strtotime($_POST["edate"]));
	$currentDateTime = date('Y-m-d H:i:s'); 
	mysqli_query($mysqli,"update tbl_amz_entry set duration=".$ad.",dur_ms=".$ams.",ds_number='".$_POST["dsnum"]."',c_duration='".$comdur."',cdur_ms='".$cms."',indate = '".$in."',filetype='".$_POST["flty"]."',sub='".$_POST["subcatg"]."',file_status='".$_POST["flsts"]."',speaker=".$_POST["nospk"].",start_date = '".$s."',comptime = '".$currentDateTime."',end_date = '".$e."' where tid = '".$_POST["tranid"]."' order by id desc limit 1 ")or die(mysqli_error($mysqli));
	echo "<script>alert('Record Updated Successfully');</script>";

	echo "<script>window.location.href='entryview.php'</script>";
}else{
	echo "Error";
}
?>