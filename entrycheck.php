<?php
	include("include/connect.php");
	if(isset($_GET["tid"]))
	{
		$result=mysqli_query($mysqli,"select * from tbl_amz_users where tid='".$_GET["tid"]."'");
		if (!$result) {
		    printf("Error: %s\n", mysqli_error($mysqli));
		    exit();
		}
		$ar1=mysqli_fetch_array($result);
		$no_rows=mysqli_num_rows($result);

		if($no_rows==1)
		{
			$result1=mysqli_query($mysqli,"select tid,file_status from tbl_amz_entry where tid='".$_GET["tid"]."' order by id desc limit 1");
			$ar2=mysqli_fetch_array($result1);
			$no_rows1=mysqli_num_rows($result1);
			if($no_rows1==1){
				if ($ar2["file_status"]==1) {
					echo "3"; //Exit Tran Id 
				}else{ echo "2";}
			}else echo "2"; // New File Status
		}
		else
		{
			echo "1"; // no tid contact admin
		}
	}else{
		echo "0"; //tid not passed
	}
$mysqli -> close();
?>