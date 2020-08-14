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
	<link rel="stylesheet" type="text/css" href="Ken-userDash.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
	
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
      <link rel="icon" href="images/logo.ico" type="image/x-icon">  
  </head>
<body>
   
<!--NAVIGATION-->

<div id="myNavbar" class="navbar navbar-default navbar-fixed-top" role="navigation" >
	<!-- <div class="container"> -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			
			<a href="index.php" class="navbar-brand" id="navTitle">KENGURU</a>
		</div>

		 
		  <!-- <ul class="nav navbar-nav navbar-right">
			<li><a href="signlogin.php">Sign Up <i class="fa fa-user-plus" aria-hidden="true"></i></a></li>
			<li><a href="login.php">Login <i class="fa fa-sign-in" aria-hidden="true"></i></a></li>
		  </ul> -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			  

<?php

					if(isset($_SESSION['id'])){
					  $std=$_SESSION['id'];
					  include 'dbh.php';

					    $sql="SELECT * from customer where customer_id = '$std'";
					    $result= mysqli_query($conn ,$sql)or die(mysqli_error($conn));
					    
					    if($row=mysqli_fetch_assoc($result)){
					      	
					      	echo "<ul class='nav navbar-nav navbar-right'>
								<li><a href='Ken-userDash.php''>".$row['first_name']."</i></a></li>
		        				<li><a href='logout.php''>Logout <i class='fa fa-sign-in' aria-hidden='true'></i></a></li>
		        				</ul>";

							}
					}
?>

		        <!-- <li><a href="#">User</i></a></li>
		        <li><a href="#">Logout <i class="fa fa-sign-in" aria-hidden="true"></i></a></li> -->
		      
		    </div>
	<!-- </div> -->
</div>
   
   
<!--- End Navigation ---->
  
<div class="jumbotron" id="jumbotron">
	<div class="container">
<?php

					if(isset($_GET['cid'])){
					  $std=$_GET['cid'];
					  include 'dbh.php';

					    $sql="SELECT * from customer where customer_id = '$std'";
					    $result= mysqli_query($conn ,$sql)or die(mysqli_error($conn));
					    
					    if($row=mysqli_fetch_assoc($result)){
					      	
					      	echo "<h1>Say hi to ".$row['first_name']."!</h1>";

							}
					}
?>
	  
  	</div>
</div>


<!-- info -->
 <div id="sstabnav" class="sstabnav">
<div class="container">
	<div class="row">
  					
  					<div class="col-md-6">
  						<h1>Photo</h1>
  					</div>
 					
 					<div class="col-md-6">
<?php

					if(isset($_GET['cid'])){
					  $std=$_GET['cid'];
					  include 'dbh.php';

					    $sql="SELECT * from customer where customer_id = '$std'";
					    $result= mysqli_query($conn ,$sql)or die(mysqli_error($conn));
					    
					    if($row=mysqli_fetch_assoc($result)){
					      	
					      	echo "	<h3>Name : ".$row['first_name']." ".$row['last_name']."</h3>
 									<h3>Email : ".$row['email']."</h3>
 									<h3>Your telephone : ".$row['phone_number']."</h3>";
	 							if (is_null($row['dob'])) {
	 								echo "<h3>Date of Birth : <i>Null</i></h3>";
	 							}
	 							else{
	 								echo "<h3>Date of Birth : ".$row['dob']."</h3>";
	 							}
	 							if (is_null($row['aadhar_card'])) {
	 								echo "<h3>Aadhar Card : <i>Null</i></h3>";
	 							}
	 							else{
	 								echo "<h3>Aadhar Card : ".$row['aadhar_card']."</h3>";
	 							}

 									
							}
					}
?>

 					</div>
</div>
</div>


<!-- end of info -->
 


	<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
	<script src="js/wow.min.js"></script>
	<script>
	new WOW().init();
	</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>