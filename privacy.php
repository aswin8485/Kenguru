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
      <b>1. Privacy</b>
        <ul class="a">
            <li>
                1.1 The Website has a Privacy Policy which forms part of these Terms and Conditions. You must read and agree to the Privacy Policy prior to using the Website.
            </li>
        </ul>
        <br>
        <b>2. Intellectual Property</b>
        <ul class="a">
            <li>
               2.1 The Website and all intellectual property belonging to or associated with the Company, including any trade mark or trade name, logos and software, and all content on the Website (including, but without limitation, text, graphics, videos, music, sound, links, and software) is and remains at all times the property of the Company and/or is used under licence from its suppliers and is protected under international treaty provisions and world-wide copyright laws and you agree that you will not infringe any such rights in any way.
            </li>
            <li>
               2.2 Except as expressly permitted by these Terms and Conditions, you may not  copy, reproduce, redistribute, download, republish, transmit, display, adapt, alter, create derivative works from or otherwise extract or re-utilise any content in any way or on any medium (including other websites) without our prior written consent.   Nor do we grant any express or implied right to you under any of our trademarks, copyrights or other proprietary rights.
            </li>
            <li>
               2.3 The Company’s logo and any other image on the Website which bears the Company’s name are trademarks of the Company. They may not be used without our prior written consent.
            </li>
            <li>
               2.4 All information and content uploaded or otherwise sent, by any means, by you to the Website or the Company or to other Users must not infringe any third party’s intellectual property or any other legal rights. You agree and warrant that you own or have permission from the owners to use any information or content you upload or send in the manner and for the purposes that you upload or send it.
            </li>
            <li>
               2.5 When you upload or send information or other content to or via the Website, you grant the Company a worldwide, royalty-free, sub-licensable, non-exclusive licence to reproduce, edit, transmit and publish the information or content for the purposes of these Terms and Conditions.
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
 <br><br>
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

	<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
	<script src="js/wow.min.js"></script>
    <script>
    new WOW().init();
    </script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>