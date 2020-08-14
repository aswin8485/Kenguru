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
	<link rel="stylesheet" type="text/css" href="index.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
      <link rel="icon" href="images/logo.ico" type="image/x-icon">
  </head>
    <style>
        .terms{
            margin-top: 150px;
            width:1000px;
            height: suto;
            color:black;
            background-color: #d9d9d9;
            padding-left: 5em;
            padding-right: 5em;
            padding-top: 5em;
            padding-bottom: 5em;
            text-align: left;
            margin-left: 40px;

        }
        ul.a{
            
           padding-left: 2em;
            line-height: 2em;
           
        }
    
    </style>
  <body>
    <center>
    <div class="terms">
       <h2>Terms & Conditions</h2>
        <br>
        <b>1.Introduction</b>
        <ul class="a">
            
            <li>
               1.1 Please read these terms and conditions carefully before using www.kenguru.com. They form a legally binding agreement between you (“you”, “your”, the “User”, the “Storage Provider” or the “Storage Seeker”) and Kenguru Ltd, which governs your use of this website (the “Website”) and our services.
            </li>
            <li>
              1.2 Our services are not available to, and may not be used by, persons under the age of 18 years or to temporarily or indefinitely suspended Users. If you do not qualify, please do not use our Services. If you are registering as a business entity, by agreeing to these Terms and Conditions you represent that you have the authority to bind that business entity to these Terms and Conditions.
            </li>
        </ul>
        <br>
        <b>2.Definitions</b>
        <ul class="a">
            <li>
                2.1<b> Price</b> - means the amount charged by the Storage Provider for use of the Storage Space
            </li>
            <li>
                2.2<b> Storage Agreement</b> - means the standard contract for a Kenguru which is supplied by the Company for signature by by a Storage Provider and a Storer. A Storage Agreement will be completed and signed by the Signatories for each Kenguru. A template Storage Agreement can be found here, but the template is subject to change from time to time at the Company’s discretion
            </li>
            <li>
                2.3<b> Storage Space</b> - means the physical space at the Storage Address in which items are stored under a Storage Agreement
            </li>
            <li>
                2.4<b> Storer/Rentee</b> - means the person paying the Price and utilising a Storage Space to store items belonging to them or under their control
            </li>
        </ul>
        <br>
        <b>3.Terms and conditions</b>
        <ul class="a">
            <li>
                3.1 The Company gives no warranties or guarantees about the items kept in the space.
            </li>
            <li>
                3.2 No charges are taken by the Company.
            </li>
            <li>
                3.3 Dealings are done directly with the Renter and the Rentee
            </li>
            <li>
                3.4 Rentee shall use the storage unit for storage purpose only and will not store live animals or perishable goods inside the space
            </li>
            <li>
                3.5 Illegal Activities and items are prohibited on the premises at all time
            </li>
        </ul>
        <br>
        <b>4.Prohibited Items</b>
        <b>Prohibited items</b> You confirm that you are not storing or allowing the storage of any of the following:
        <ul class="a">
            <li>
                4.1 Toxic, polluted or contaminated goods. Firearms, munitions or explosives. Radioactive materials.
            </li>
            <li>
                4.2 Flammable or hazardous goods. Living plants or animals. Food or perishable goods. Anything damp,mouldy, rotten or moth-infested. 
            </li>
            <li>
                4.3 Cash and securities. Illegal goods. 
            </li>
            <li>
                4.4 Waste
            </li>
        </ul>
      </div>
      </center>
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
	        <li><a href="#howitworks">How it works</a></li>
	        <li><a href="#benefits">Benefits</a></li>
	        <li><a href="#contact">Contact</a></li>
	       
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


	      <!-- <ul class="nav navbar-nav navbar-right">
	        <li><a href="signlogin.php">Sign Up <i class="fa fa-user-plus" aria-hidden="true"></i></a></li>
	        <li><a href="login.php">Login <i class="fa fa-sign-in" aria-hidden="true"></i></a></li>
	      </ul> -->
	    </div><!-- /.navbar-collapse -->
</div>
   
<!--- End Navigation ---->
  


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
                 <p><i class="fa fa-square-o" aria-hidden="true"></i> About Us</p>
                 <p><i class="fa fa-square-o" aria-hidden="true"></i> Privacy</p>
                 <p><i class="fa fa-square-o" aria-hidden="true"></i> Term & Condition</p>
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

	<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
	<script src="js/wow.min.js"></script>
    <script>
    new WOW().init();
    </script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>