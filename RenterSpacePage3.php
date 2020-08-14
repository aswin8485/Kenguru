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
			   background: url(images/4.jpg) no-repeat;
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
	  <h1>Step 3</h1>
	  <p>Additional Information</p>
	</div>
</div>



<!-- Sign up -->
<div id="myForm" class="container" >
	<form role="form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
	<div class="row">
		<div class="col-md-6">				
			  			<label class="control-label">Access : </label>
						<div class="row">
							<div class="col-md-2">
							</div>
							<div class="col-md-8">
								<div class="funkyradio">
							        <div class="funkyradio-success">
							            <input type="checkbox" name="access[]" value="24 Hour Access" id="access1"/>
							            <label for="access1">24 Hour Access</label>
							        </div>
							        <div class="funkyradio-success">
							            <input type="checkbox" name="access[]" value="Loading/Unloading Parking" id="access2"/>
							            <label for="access2">Loading/Unloading Parking</label>
							        </div>
							        <div class="funkyradio-success">
							            <input type="checkbox" name="access[]" value="Own Keys" id="access3"/>
							            <label for="access3">Own Keys</label>
							        </div>
							        
							    </div>
							</div>
							<div class="col-md-2">
							</div>
						</div>

						 </br>

						<label class="control-label">Security features : </label>
						<div class="row">
							<div class="col-md-2">
							</div>
							<div class="col-md-8">
								<div class="funkyradio">
							        <div class="funkyradio-success">
							            <input type="checkbox" name="sf[]" value="High Security Lock" id="security1"/>
							            <label for="security1">High Security Lock</label>
							        </div>
							        <div class="funkyradio-success">
							            <input type="checkbox" name="sf[]" value="CCTV" id="security2"/>
							            <label for="security2">CCTV</label>
							        </div>
							        <div class="funkyradio-success">
							            <input type="checkbox" name="sf[]" value="Supervised" id="security3"/>
							            <label for="security3">Supervised</label>
							        </div>
							        <div class="funkyradio-success">
							            <input type="checkbox" name="sf[]" value="Security personal" id="security4"/>
							            <label for="security4">Security personal e.g: security guard</label>
							        </div>
							        <div class="funkyradio-success">
							            <input type="checkbox" name="sf[]" value="Well Lit Area" id="security5"/>
							            <label for="security5">Well Lit Area</label>
							        </div>
							        <div class="funkyradio-success">
							            <input type="checkbox" name="sf[]" value="Someone usually at home" id="security6"/>
							            <label for="security6">Someone usually at home</label>
							        </div>
							          <div class="funkyradio-success">
							            <input type="checkbox" name="sf[]" value="Security personal" id="security7"/>
							            <label for="security7">Security personal</label>
							        </div>
							    </div>
							</div>
							<div class="col-md-2">
							</div>
						</div>
					</br>
					<div class="form-group">
				            <label class="control-label">Choose your Preferred Payment Method : </label>
					    		<!-- <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Name"> -->
								  <select name="payment" style="color: black;">
								    	<option value="Cash">Cash</option>
								    	<option value="Net Banking">Net Banking</option>
								    	<!-- <option value="Credit/Debit Card">Credit/Debit Card</option> -->
								  </select>
				    </div>
					<div class="form-group">
				            <label class="control-label">Description / Additional Information of Space</label>
				            <textarea  class="form-control" placeholder="Maximum 500 Characters" required="required" rows="10" name="desc" maxlength="500"></textarea>
				    </div>


		</div>


		<div class="col-md-6">
			
						<label class="control-label">Additional Details : </label>
						<div class="row">
							<div class="col-md-2">
							</div>
							<div class="col-md-8">
								<div class="funkyradio">
							        <div class="funkyradio-success">
							            <input type="checkbox" name="ad[]" value="Dry" id="add1"/>
							            <label for="add1">Dry</label>
							        </div>
							        <div class="funkyradio-success">
							            <input type="checkbox" name="ad[]" value="Dust Free" id="add3"/>
							            <label for="add3">Dust Free</label>
							        </div>
							        <div class="funkyradio-success">
							            <input type="checkbox" name="ad[]" value="Heated" id="add4"/>
							            <label for="add4">Heated</label>
							        </div>
							        <div class="funkyradio-success">
							            <input type="checkbox" name="ad[]" value="Help With Loading" id="add5"/>
							            <label for="add5">Help With Loading</label>
							        </div>
							    </div>
							</div>
							<div class="col-md-2">
							</div>
						</div>

			     
			    </br>


			    <label class="control-label">Storage suitable for : </label>
			     <div class="row">
							<div class="col-md-2">
							</div>
							<div class="col-md-8">
								<div class="funkyradio">
										<div class="funkyradio-success">
								            <input type="checkbox" name="ssf[]" value="Clothes/Bedding" id="storage1"/>
								            <label for="storage1">Clothes/Bedding</label>
								        </div>
								        <div class="funkyradio-success">
								            <input type="checkbox" name="ssf[]" value="Furniture" id="storage2"/>
								            <label for="storage2">Furniture</label>
								        </div>
								        <div class="funkyradio-success">
								            <input type="checkbox" name="ssf[]" value="Vehicles" id="storage3"/>
								            <label for="storage3">Vehicles</label>
								        </div>
								        <div class="funkyradio-success">
								            <input type="checkbox" name="ssf[]" value="Sports Equipment" id="storage4"/>
								            <label for="storage4">Sports Equipment</label>
								        </div>
								        <div class="funkyradio-success">
								            <input type="checkbox" name="ssf[]" value="Document Storage" id="storage5"/>
								            <label for="storage5">Document Storage</label>
								        </div>
								        <div class="funkyradio-success">
								            <input type="checkbox" name="ssf[]" value="Books And Records" id="storage6"/>
								            <label for="storage6">Books And Records</label>
								        </div>
								        <div class="funkyradio-success">
								            <input type="checkbox" name="ssf[]" value="Student Storage" id="storage7"/>
								            <label for="storage7">Student Storage</label>
								        </div>
								         <div class="funkyradio-success">
								            <input type="checkbox" name="ssf[]" value="General Household Storage" id="storage8"/>
								            <label for="storage8">General Household Storage</label>
								        </div>
								          <div class="funkyradio-success">
								            <input type="checkbox" name="ssf[]" value="Commercial And Business Storage" id="storage9"/>
								            <label for="storage9">Commercial And Business Storage</label>
								        </div>
								          <div class="funkyradio-success">
								            <input type="checkbox" name="ssf[]" value="Bikes" id="storage10"/>
								            <label for="storage10">Bikes</label>
								        </div>
							    </div>
							</div>
							<div class="col-md-2">
							</div>
				</div>
				    
			  
			  <button class="btn btn-success btn-lg pull-right" type="submit">Submit  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> </button>
		</div>
</div>
<!-- end of sign up -->
<center><p>
<?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            	
            	$storeageID=$_SESSION['store_id'];
            	$checker=1;
            	$desc=$_POST['desc'];
            	$payment = $_POST['payment'];
        		
        		include 'dbh.php';

            	//access

            	foreach($_POST['access'] as $selected) {

					$sql="INSERT INTO access_info(storage_id,value) VALUES ('$storeageID','$selected')";

	                $retval = mysqli_query($conn ,$sql)or die(mysqli_error($conn));

	                if($retval==1){
	                	
	                }
	                else{
	                	$checker=0;
	                	echo "Failed to query database ".mysqli_error($conn);
	                }

				}

				//security features

            	foreach($_POST['sf'] as $selected) {

					$sql="INSERT INTO security_features(storage_id,value) VALUES ('$storeageID','$selected')";

	                $retval = mysqli_query($conn ,$sql)or die(mysqli_error($conn));

	                if($retval==1){
	                	
	                }
	                else{
	                	$checker=0;
	                	echo "Failed to query database ".mysqli_error($conn);
	                }

				}

				//Additional Details

            	foreach($_POST['ad'] as $selected) {

					$sql="INSERT INTO additional_details(storage_id,value) VALUES ('$storeageID','$selected')";

	                $retval = mysqli_query($conn ,$sql)or die(mysqli_error($conn));

	                if($retval==1){
	                	
	                }
	                else{
	                	$checker=0;
	                	echo "Failed to query database ".mysqli_error($conn);
	                }

				}


				//storage suitable

            	foreach($_POST['ssf'] as $selected) {

					$sql="INSERT INTO storage_suitable(storage_id,value) VALUES ('$storeageID','$selected')";

	                $retval = mysqli_query($conn ,$sql)or die(mysqli_error($conn));

	                if($retval==1){
	                	
	                }
	                else{
	                	$checker=0;
	                	echo "Failed to query database ".mysqli_error($conn);
	                }

				}

				if($checker==1){
					// $sql="INSERT INTO storage(desc_space) VALUES ('$desc') WHERE storage_id='$storeageID'";
					$sql="UPDATE storage SET desc_space='$desc' WHERE `storage_id`='$storeageID'";

	                //$result= mysql_query($sql);
	                $retval = mysqli_query($conn ,$sql)or die(mysqli_error($conn));

	                if($retval==1){
		                	$sql="UPDATE storage SET payment_method='$payment' WHERE `storage_id`='$storeageID'";

					        //$result= mysql_query($sql);
					        $retval = mysqli_query($conn ,$sql)or die(mysqli_error($conn));

					        if($retval==1){
					        	header("Location: RenterSpacePage4.php");
					        }
					        else{
					        	echo "Failed to query database ".mysqli_error($conn);
					        }
	                }
	                else{
	                	echo "Failed to query database ".mysqli_error($conn);
	                }
					
				}
          }
?>
</p></center>
    </div>


	
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