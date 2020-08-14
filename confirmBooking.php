<?php
session_start();
ob_start();

$renteeeeeID = $_GET['cvalue'];
$storageID = $_GET['bvalue'];
$renterID = $_GET['rvalue'];

include 'dbh.php';

	
	$sql7="UPDATE storage SET rentee_id = '$renteeeeeID' WHERE storage_id = '$storageID'";
	$retval7 = mysqli_query($conn ,$sql7)or die(mysqli_error($conn));
	
	if($retval7==1){


			$sql="SELECT * from customer where customer_id = '$renteeeeeID'";
			$result= mysqli_query($conn ,$sql)or die(mysqli_error($conn));

			$sql2="SELECT * from customer where customer_id = '$renterID'";
			$result2= mysqli_query($conn ,$sql2)or die(mysqli_error($conn));

			$sql3="SELECT * from storage where  storage_id='$storageID'" ;
        	$result3= mysqli_query($conn ,$sql3)or die(mysqli_error($conn));

            if($row=mysqli_fetch_assoc($result)){
              	if($row2=mysqli_fetch_assoc($result2)){
              		if($row3=mysqli_fetch_assoc($result3)){
						$renteeName=$row['first_name'];
						$renterName=$row2['first_name'];
						$storageName=$row3['storage_name'];

						$message="Congrats $renteeName, $renterName approved your booking request for the Storage with the name $storageName.";
						

						$sql5="INSERT INTO message(message,from_user,to_user) VALUES ('$message','$renterID','$renteeeeeID')";

			            //$result= mysql_query($sql);
			            $retval5 = mysqli_query($conn ,$sql5)or die(mysqli_error($conn));

			            if($retval5==1){


			            	$message="Congrats $renterName, your Storage with the name $storageName is booked by $renteeName.";
						

							$sql8="INSERT INTO message(message,from_user,to_user) VALUES ('$message','$renteeeeeID','$renterID')";

				            //$result= mysql_query($sql);
				            $retval8 = mysqli_query($conn ,$sql8)or die(mysqli_error($conn));

				            if($retval8==1){
								// header("Location : tickAnimation.php");
			            		echo "<script type='text/javascript'> document.location = 'tickAnimation.php'; </script>";
				            }

			            	
			            }
			            else{
			            	echo "Failed to query database ".mysqli_error($conn);
			            }    
					}
              	}
            }
	}
?>