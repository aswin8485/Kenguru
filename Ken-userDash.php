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

					if(isset($_SESSION['id'])){
					  $std=$_SESSION['id'];
					  include 'dbh.php';

					    $sql="SELECT * from customer where customer_id = '$std'";
					    $result= mysqli_query($conn ,$sql)or die(mysqli_error($conn));
					    
					    if($row=mysqli_fetch_assoc($result)){
					      	
					      	echo "<h1>Hello, ".$row['first_name']."!</h1>";

							}
					}
?>
	  
	  <p>Dashboard</p>
  	</div>
</div>


<!--- tabs ---->
 
 <div id="tabnav" class="tabnav">
	 <div class="container">
		  <ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="#profile">Profile</a></li>
			<li><a data-toggle="tab" href="#menu1">Messages</a></li>
			<li><a data-toggle="tab" href="#menu2">My Storage</a></li>
			<li><a data-toggle="tab" href="#menu3">My Booking</a></li>
		  </ul>

		  <div class="tab-content">
			<div id="profile" class="tab-pane fade in active">
			  	<div class="row">
  					
  					<div class="col-md-6">
 <?php
 					$std=$_SESSION['id'];
					  include 'dbh.php';


					    $sql="SELECT * from customer where customer_id = '$std'";
					    $result= mysqli_query($conn ,$sql)or die(mysqli_error($conn));

					    if (is_null($row['display_picture'])) {
					    	echo "<center><h1>Photo</h1>
  							<button class='btn btn-primary' onclick=location.href='profileupload.php'>Upload</button></center>";
					    }
					    else{
					    	$path = './ProUploadFolder'; 
   							$files =glob($path.'/'.$std.'_*.jpg');
					    	foreach($files as $file){
					    	echo "<center><img src='$file' class='img-responsive' alt='Fjords' width='75%' height='75%''></center>";
					    }
					    }

 ?> 						

  						
  					</div>
 					
 					<div class="col-md-6">
<?php

					if(isset($_SESSION['id'])){
					  $std=$_SESSION['id'];
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
                        <button type="button" class="btn btn-primary btn-lg btn-block login-button" onclick="location.href = 'Ken-UserEdit.php';" >Edit</button>
 					</div>
				</div>
			</div>
			<div id="menu1" class="tab-pane fade">
			  <h4>Inbox</h4>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>From</th>
                            <th>Message</th>
                            <th>Link</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
<?php

	if(isset($_SESSION['id'])){
	  	
	  	$std=$_SESSION['id'];
	  	include 'dbh.php';

	    $sql="SELECT * from message where to_user = '$std'";
	    $result= mysqli_query($conn ,$sql)or die(mysqli_error($conn));

	    
	    while($row=mysqli_fetch_array($result)){
	      		
	      		$sender=$row['from_user'];

	      		$sql2="SELECT * from customer where customer_id = '$sender'";
				$result2= mysqli_query($conn ,$sql2)or die(mysqli_error($conn));
				$row2=mysqli_fetch_assoc($result2);

		      	echo "<tr>
		      		<th><a href='profileshow.php?cid=$sender'>".$row2['first_name']." ".$row2['last_name']."</a></th>
                    <th>".$row['message']."</th>
                    <th> <a href=".$row['link']."> Approve Booking</a></th>
                    <th> <a href=deleteMessage.php?mvalue=".$row['idmessage']."> Delete Message</a></th>
                    </tr>";
			}
	}
?> 
                        </tr>
                    </tbody>
                </table>
			</div>
			<div id="menu2" class="tab-pane fade">
			  <h3>Your listed storage</h3>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Storage Name</th>
                            <th>Link</th>
                            <th>Status</th>
                            <!-- <th>Edit</th>
                            <th>Delete</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
<?php

	if(isset($_SESSION['id'])){
	  	
	  	$std=$_SESSION['id'];
	  	include 'dbh.php';

	    $sql="SELECT * from storage where owner_id = '$std'";
	    $result= mysqli_query($conn ,$sql)or die(mysqli_error($conn));

	    
	    while($row=mysqli_fetch_array($result)){
	      		

		      	echo "<tr>
		      		<th>".$row['storage_name']."</th>
                    <th><a href=storageshow.php?bvalue=".$row['storage_id']."> Click here for Storage Info</th>
                    <th>";
                    if(is_null($row['rentee_id'])){
                    	echo "Vacant";
                    }
                    else{
                    	echo "Booked";
                    }
                 echo "</th>
                    </tr>";
			}
	}
?> 
                        </tr>
                    </tbody>
                </table>
			  
			</div>
			<div id="menu3" class="tab-pane fade">
			  <h3>My Booking</h3>
			  	<table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Storage Name</th>
                            <th>Link</th>
                            <!-- <th>Edit</th>
                            <th>Delete</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
<?php

	if(isset($_SESSION['id'])){
	  	
	  	$std=$_SESSION['id'];
	  	include 'dbh.php';

	    $sql="SELECT * from storage where rentee_id = '$std'";
	    $result= mysqli_query($conn ,$sql)or die(mysqli_error($conn));

	    
	    while($row=mysqli_fetch_array($result)){
	      		

		      	echo "<tr>
		      		<th>".$row['storage_name']."</th>
                    <th><a href=storageshow.php?bvalue=".$row['storage_id']."> Click her for Storage Info</th>
                    </tr>";
			}
	}
?> 
                        </tr>
                    </tbody>
                </table>
			</div>
		  </div>

	 </div>
 </div>
<br><br><br><br><br><br><br>
<!--- Benefits ------>

 
 <!---- End Benefits -->
<!---- Footer ---->
 
 <div id="footer" class="footer">
     <div class="container">
         <div class="row">
             <div class="col-lg-4 col-md-4">
                 <h4 class="wow fadeInUp">Contact Us</h4>
                 
                 <p><i class="fa fa-envelope" aria-hidden="true"></i> www.kenguru@gmail.com</p>
                 <p><i class="fa fa-phone" aria-hidden="true"></i> +91 740 680 62 59</p>
                 <p><i class="fa fa-globe" aria-hidden="true"></i> www.kenguru.com</p>
             </div>
             <div class="col-lg-4 col-md-4">
                 <h4>About</h4>
                 <p><i class="fa fa-square-o" aria-hidden="true"></i><a style="color:darkgray" href="privacy.php"> Privacy</a></p>
                 <p><i class="fa fa-square-o" aria-hidden="true"></i><a style="color:darkgray" href="tc.php"> Term & Condition</a></p>
             </div>
             <div class="col-lg-4 col-md-4">
                 <h4>Stay in touch</h4>
                 <i class="social fa fa-facebook" aria-hidden="true"></i>
                 <i class="social fa fa-twitter" aria-hidden="true"></i>
                <i class="social fa fa-linkedin" aria-hidden="true"></i>
                <i class="social fa fa-pinterest" aria-hidden="true"></i>
                <i class="social fa fa-youtube" aria-hidden="true"></i>
                <i class="social fa fa-github" aria-hidden="true"></i><br>
             </div>
         </div>
     </div>
 </div>
<!---- End tabs ---->

	<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
	<script src="js/wow.min.js"></script>
	<script>
	new WOW().init();
	</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>