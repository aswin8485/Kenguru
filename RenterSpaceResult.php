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

	<link rel="stylesheet" type="text/css" href="RenterSpaceResult.css">

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
      <link rel="icon" href="images/logo.ico" type="image/x-icon">
	</head>
    	<style>
		body{
			    background: url(images/2.jpg) no-repeat;
			    /*max-width: 100%;*/
			    /*min-width: 300px;*/
			    /*height: auto;*/
			    background-attachment: fixed;
                color: white;
			    
		}
            .footer{
            color: black;
            background-color: #d9d9d9;
            width: 100%;
            height: 30px;
            text-align: right;
            padding-right: 15px;
            bottom:0;
        }
	</style>
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
  echo "<ul class='nav navbar-nav navbar-right'>
	        <li><a href='signlogin.php'>Sign Up <i class='fa fa-user-plus' aria-hidden='true'></i></a></li>
	        <li><a href='login.php'>Login <i class='fa fa-sign-in' aria-hidden='true'></i></a></li>
	      </ul>";
}

?>
			</div><!-- /.navbar-collapse -->
</div>
	 
<!--- End Navigation ---->

<div class="jumbotron" id="jumbotron">
	<div class="container">
	  <h1>Your Storage is live!</h1>
	  <p></p>
	</div>
</div>

<!-- storage information -->



<?php
		$storageID = $_SESSION['store_id'];

        include 'dbh.php';

        $sql="SELECT * from storage where  storage_id='$storageID'" ;
        
        $result= mysqli_query($conn ,$sql)or die(mysqli_error($conn));

        


        if($row=mysqli_fetch_assoc($result)){
        	
        	$customerID = $row['owner_id'];
		$sql2="SELECT * from customer where  customer_id='$customerID'" ;
        	$result2= mysqli_query($conn ,$sql2)or die(mysqli_error($conn));
        	$row2=mysqli_fetch_assoc($result2);

        	$addressID = $row['address2_id'];
		$sql3="SELECT * from address where  address_id='$addressID'" ;
        	$result3= mysqli_query($conn ,$sql3)or die(mysqli_error($conn));
        	$row3=mysqli_fetch_assoc($result3);

        	$path = './UploadFolder'; 
   		$files = glob($path.'/'.$storageID.'_*.jpg');
			
			$sql4="SELECT * from storage_suitable where  storage_id='$storageID'" ;
        	$result4= mysqli_query($conn ,$sql4)or die(mysqli_error($conn));
        	
        	$sql5="SELECT * from access_info where  storage_id='$storageID'" ;
        	$result5= mysqli_query($conn ,$sql5)or die(mysqli_error($conn));

        	$sql6="SELECT * from additional_details where  storage_id='$storageID'" ;
        	$result6= mysqli_query($conn ,$sql6)or die(mysqli_error($conn));

			$sql7="SELECT * from security_features where  storage_id='$storageID'" ;
        	$result7= mysqli_query($conn ,$sql7)or die(mysqli_error($conn));

          echo "<div class='container' id='storageInfo'>
			  <h1>".$row['storage_name']."</h1>

			  <div class='row'>
				<div class='col-sm-6 col-md-6 col-lg-6'>
					<h4>Renter : ".$row2['first_name']." ".$row2['last_name']."</h4>
					<h4>Storage Size : ".$row['storage_size']."</h4>
					<h4>Storage Type : ".$row['storage_type']."</h4>
					<h4>Youtube Video : ".$row['yt_video']."</h4>
					<h4>Address : ".$row3['house_flat_no']." , ".$row3['street_colony']." , ".$row3['city']." , ".$row3['state']." , Pin: ".$row3['pincode']." , Landmark: ".$row3['land_mark']."</h4>
					<h4>Storage Suitable For : ";
while($row4=mysqli_fetch_array($result4)) {
	$c1=$row4['value'];
	echo "<br>$c1 ";
}
					echo "</h4>
					<h4>Additional Details : ";
while($row6=mysqli_fetch_array($result6)) {
	$c1=$row6['value'];
	echo "<br>$c1 ";
}
					echo "</h4>

				</div>
				<div class='col-sm-6 col-md-6 col-lg-6'>
					<h4>Available From : ".$row['start_date']."</h4>
					<h4>Available Till : ".$row['stop_date']."</h4>
					<h4>Payment Method : ".$row['payment_method']."</h4>
					<h4>Rent Per Week : ".$row['rent']."</h4>
					<h4>Description : ".$row['desc_space']."</h4>
					<h4>Access : ";
while($row5=mysqli_fetch_array($result5)) {
	$c1=$row5['value'];
	echo "<br>$c1 ";
}
					echo "</h4>
					<h4>Security Features : ";
while($row7=mysqli_fetch_array($result7)) {
	$c1=$row7['value'];
	echo "<br>$c1 ";
}
					echo "</h4>
				</div>
			  </div>

			  <h3>Pictures</h3> <div class='row'>";

			  
			foreach($files as $file){
			    //$file = str_replace('.php','',$file);
			    // echo "<img src='$file' class='img-rounded' alt='Cinque Terre' width='304' height='236'> ";
			   echo" <div class='col-md-4' id='pictureStore'>
					      <a href='$file'>
					        <img src='$file' class='img-responsive' alt='Fjords' width='75%' height='75%'>
					      </a>
				</div>
			    ";

			}
			  echo"</div><br><br><button class='btn btn-primary btn-lg pull-right' onclick=window.location.href='index.php'>Back to homepage</button>
			</div>";
        }
        else{
			echo "No Search Results";
	}

?>


<!-- end of storage information -->


	
	<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="js/renter.js"></script>
	<script src="js/wow.min.js"></script>
		<script>
		new WOW().init();
		</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <div class="footer">
        Kenguru &#169 2017 - www.kenguru.in
        
        </div>
	</body>
</html>