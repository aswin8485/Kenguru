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

	<link rel="stylesheet" type="text/css" href="RenterSpace.css">
        
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
      <link rel="icon" href="images/logo.ico" type="image/x-icon">
	</head>
	<style>
		body{
			    background: url(images/1.jpg) no-repeat;
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
            position: fixed;
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
  header("Location: signlogin.php");
}

?>
<!--				<ul class="nav navbar-nav navbar-right">-->
<!--					<li><a href="signlogin.php">Sign Up <i class="fa fa-user-plus" aria-hidden="true"></i></a></li>-->
<!--					<li><a href="login.php">Login <i class="fa fa-sign-in" aria-hidden="true"></i></a></li>-->
<!--				</ul>-->
			</div><!-- /.navbar-collapse -->
</div>
	 
<!--- End Navigation ---->

<div class="jumbotron" id="jumbotron">
	<div class="container">
	  <h1>Step 1</h1>
	  <p>Give Address of the Storage Location</p>
	</div>
</div>



<!-- Sign up -->
<div id="myForm" class="container" >
	<form role="form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
	<div class="row">
		<div class="col-md-6">

			<div class="form-group">
		            <label class="control-label">House No / Flat / Floor / Building : </label>
		            <input type="text" required="required" class="form-control" placeholder="Enter House No / Flat / Floor / Building" name="house" minlength="3" maxlength="100">
		          </div>
		          <div class="form-group">
		            <label class="control-label">Street / Colony / Locality : </label>
		            <input type="text" required="required" class="form-control" placeholder="Enter Street / Colony / Locality" name="street" minlength="3" maxlength="100">
		          </div>
		          <div class="form-group">
		            <label class="control-label">Land Mark : </label>
		            <input type="text" class="form-control" placeholder="Enter Land Mark" name="landmark" minlength="3" maxlength="45">
				</div>
			  
		</div>


		<div class="col-md-6">
			
			<div class="form-group">
			    <label class="control-label">City : </label>
			    <select class="form-control" name="city">
                    <option value="Bengaluru Urban">Select a city</option>
                    <option value="Bengaluru Urban">Bengaluru Urban</option>
                    <option value="Bengaluru Rural">Bengaluru Rural</option> 
                    <option value="Belagavi">Belagavi</option>
                    <option value="Bellary">Bellari</option>
                    <option value="Chamarajanagar">Chamarajnagar</option>
                    <option value="Chikkamagaluru">Chikkamagaluru</option>
                    <option value="Hassan">Hassan</option>
                    <option value="Kolar">Kolar</option>
                    <option value="Mandya">Mandya</option>
                    <option value="Mysuru">Mysuru</option>
                    <option value="Tumakuru">Tumakuru</option>
                    <option value="Udupi">Udupi</option>
                    <option value="Mangalore">Mangalore</option>
                </select>
			  </div>
		          <div class="form-group">
			    <label class="control-label">State : </label>
			    <select class="form-control" name="state">
                    <option value="Karnataka">Karnataka</option> 
                </select>
			  </div>
			  <div class="form-group">
			    <label class="control-label">Pincode : </label>
			    <input type="number" required="required" class="form-control" placeholder="Enter Pincode" name="pincode" min="529999" max="600000">
			  </div>
			  
			  <button class="btn btn-success btn-lg pull-right" type="submit">Submit And Continue <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> </button>
		</div>
	</div>
	</form>
</div>
<!-- end of sign up -->
<center><p>
<?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            	$house = $_POST['house'];
            	$street = $_POST['street'];
            	$landmark = $_POST['landmark'];
            	$city = $_POST['city'];
            	$state = $_POST['state'];
            	$pincode = $_POST['pincode'];
            	
            	if(!preg_match('/^[5][3-9][0-9]{4}/', $pincode)){
            		echo 'Invalid Pincode!';
            	}
            	else{
	            	include 'dbh.php';

	                $sql="INSERT INTO address(state,city,street_colony,house_flat_no,land_mark,pincode) VALUES ('$state','$city','$street','$house','$landmark','$pincode')";

	                //$result= mysql_query($sql);
	                $retval = mysqli_query($conn ,$sql)or die(mysqli_error($conn));

	                if($retval==1){
	                	
	                	$sql="SELECT * from address where house_flat_no='$house'";

		                $result= mysqli_query($conn ,$sql)or die(mysqli_error($conn));

		                if($row=mysqli_fetch_assoc($result)){
		                  	
		                  	$_SESSION['addr_id']=$row['address_id'];
					header("Location: RenterSpacePage2.php");
		                }
	                }
	                else{
	                	echo "Failed to query database ".mysqli_error($conn);
	                }
            	}
          }
?>
</p></center>
	
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