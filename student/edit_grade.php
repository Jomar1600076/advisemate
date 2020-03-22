<?php
session_start();
if(isset($_POST['submit'])) {

	for($i=0;$i<$count;$i++){
		$sql1="UPDATE grades SET name='$name[$i]', lastname='$lastname[$i]', email='$email[$i]' WHERE id='$id[$i]'";
		$result1=mysql_query($sql1);
		}
		}
		
		if($result1){
		header("location:update_multiple.php");
		}
		mysql_close();
?>