<?php
$messageID = $_GET['mvalue'];

include 'dbh.php';


	$sql7="DELETE FROM message WHERE idmessage='$messageID'";
	$retval7 = mysqli_query($conn ,$sql7)or die(mysqli_error($conn));
	
	if($retval7==1){
		echo "<script type='text/javascript'> document.location = 'Ken-userDash.php'; </script>";
	}
	else{
		echo "Failed to query database ".mysqli_error($conn);
	}
?>