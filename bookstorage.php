<?php
	session_start();
	ob_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Kenguru</title>

	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<link rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

	<link rel="stylesheet" type="text/css" href="bookstorage.css">
		
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
      <link rel="icon" href="images/logo.ico" type="image/x-icon">
	</head>
	<body>
	 
<!--NAVIGATION-->

<div id="myNavbar" class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			
			<a href="index.php" class="navbar-brand" id="navTitle">KENGURU</a>
		</div>
		
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					
				 
				</ul>

<?php

if(isset($_SESSION['id'])){
  $std=$_SESSION['id'];
  include 'dbh.php';

					    $sql="SELECT * from customer where customer_id = '$std'";
					    $result= mysqli_query($conn ,$sql)or die(mysqli_error($conn));
					    
					    if($row=mysqli_fetch_assoc($result)){
					      	
					      	echo "	<ul class='nav navbar-nav navbar-right'>
	        						<li><a href='Ken-userDash.php'>".$row['first_name']."</a></li>
	       							<li><a href='logout.php'>Logout <i class='fa fa-sign-in' aria-hidden='true'></i></a></li>
	      							</ul>";

							}
}
else{

	header("Location: signlogin.php");
}

?>
			</div><!-- /.navbar-collapse -->
</div>
	 
<!--- End Navigation ---->

<div class="jumbotron" id="jumbotron">
	<div class="container">
	  <h1>Booking Request Sent!</h1>
	  <p></p>
	</div>
</div>


<!-- book result -->

<div class="container">
	<h2 style="text-transform: none;">Thank you, Renter will now receive a message to say you are interested in booking their storage space </h2>
<br><br>

	
	<h3><b>What happens next?<b> </h3>	<br>
	<h4 style="text-transform: none;"> 
		Renter will either confirm your storage booking or respond with some questions if they need more information.</li><br>

		If they confirm your booking, great! Move your belongings in and make sure you use our <a style="color:crimson;" href="Legal_Contract.pdf" download="Storage Agreement.pdf">Storage Agreement.</a>
<br><br><br>
		<a style="text-align: right; color: darkorange;" href="search.php" \> Continue searching other storage options</a>
	</h4>
</div>
<center><p>
<?php
	if(isset($_SESSION['id'])){
		    $renteeeeID=$_SESSION['id'];
		    $renterID = $_GET['cvalue'];
		    $storageID = $_GET['bvalue'];

		    include 'dbh.php';

		    $sql="SELECT * from customer where customer_id = '$renteeeeID'";
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

						$message="Hello $renterName, $renteeName would like to book your Storage with the name $storageName.";
						$link="confirmBooking.php?cvalue=$renteeeeID&rvalue=$renterID&bvalue=$storageID";

						$sql5="INSERT INTO message(message,from_user,to_user,link) VALUES ('$message','$renteeeeID','$renterID','$link')";

			            //$result= mysql_query($sql);
			            $retval5 = mysqli_query($conn ,$sql5)or die(mysqli_error($conn));

			            if($retval5==1){
			            	echo "Message Sent";
			            }
			            else{
			            	echo "Failed to query database ".mysqli_error($conn);
			            }    
					}
              	}
            }
       }
	else{
		header("Location: signlogin.php");
    }        
?>
</p></center>
<!-- end of book result -->



	
	<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="js/renter.js"></script>
	<script src="js/wow.min.js"></script>
		<script>
		new WOW().init();
		</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</body>
</html>