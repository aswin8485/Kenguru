<?php
  session_start();
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
	<link rel="stylesheet" type="text/css" href="signlogin.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<link rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

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

	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="signlogin.php">Sign Up <i class="fa fa-user-plus" aria-hidden="true"></i></a></li>
	        <li><a href="login.php">Login <i class="fa fa-sign-in" aria-hidden="true"></i></a></li>
	      </ul>
	    </div><!-- /.navbar-collapse -->

</div>
   
<!--- End Navigation ---->
  
<!-- Sign up -->

 <div id="signup" class="signup" style="margin-top:60px; opacity:0.8;">
     <div class="container">
         

				<!-- <div class="row">
					<div class="col-lg-12 col-md-12 wow flipInY">
						<i class="fa fa-search fa-lg fa-5x" aria-hidden="true"></i>
						<h3>Find space<br>near your location</h3>
					</div>
				</div>
				 -->
				 <div class="container">
			<div class="row main">
				<div class="panel-heading">
	               <div class="panel-title text-center">
	               		
	               	</div>
	            </div> 
				<div class="main-login main-center">
					<form class="form-horizontal" method="post" action="#">
						
						
						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Email</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="email" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
								</div>
							</div>
						</div>

						

						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
								</div>
							</div>
						</div>

						

						<div class="form-group ">
							<!-- <button type="button" class="btn btn-primary btn-lg btn-block login-button">Login</button> -->
							<input type="submit" class="btn btn-primary btn-lg btn-block login-button" value="Log in">
						</div>
						
					</form>

<!-- php -->

			<center><p>
<?php
		        if ($_SERVER["REQUEST_METHOD"] == "POST") {

		            	$password = $_POST['password'];
		            	$username = $_POST['email'];

		          		include 'dbh.php';
		                //mysql_select_db("library");

		                $sql="SELECT * from admin where admin_id = '$username' and admin_pass='$password'";

		                $result= mysqli_query($conn ,$sql)or die(mysqli_error($conn));

		                if($row=mysqli_fetch_assoc($result)){
		                  	$_SESSION['id']=$row['admin_id'];
		                  	header("Location: admin.php");
		                }
		                else{
		                  	$sql="SELECT * from customer where email = '$username' and customer_pass='$password'";

		                 	$result= mysqli_query($conn ,$sql)or die(mysqli_error($conn));

		                  	if($row=mysqli_fetch_assoc($result)){
		                     	$_SESSION['id']=$row['customer_id'];
		                    	header("Location: Ken-userDash.php");
		                 	}
		                 	else{
		                 			echo "Your username or password is incorrect!";
		                 	}
			
		                  
		                }
		          }
?>	
		          </p></center>

<!-- end of php -->
				</div>
			</div>
		</div>
     </div>
 </div>

 <!-- end of sign up -->
		
	<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
	<script src="js/wow.min.js"></script>
    <script>
    new WOW().init();
    </script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>