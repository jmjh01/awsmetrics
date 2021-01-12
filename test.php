<?php
  include("include/connect.php");
   $r = mysqli_query($mysqli,"select id,tid,start_date,end_date,indate,duration,dur_ms,c_duration,cdur_ms,ds_number,filetype,sub,file_status,speaker from tbl_amz_entry where tid='a' order by id desc limit 1") or die(mysqli_error($r));
                        
                     while($row=mysqli_fetch_array($r))
                      {
                      	$adur=$row["duration"];
                        echo gmdate("H:i:s", $adur);
                        echo '<br>';
                        $cdur=$row["c_duration"];	
                        echo gmdate("H:i:s", $cdur);

                      }

?>
