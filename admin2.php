<?php
  session_start();
?>
<html>
    <title>Kenguru-Admin</title>
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
		        <!-- <li><a href="#">User</i></a></li>
		        <li><a href="#">Logout <i class="fa fa-sign-in" aria-hidden="true"></i></a></li> -->
		      
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
		    </div>
    
	<!-- </div> -->
</div>


   
<!--- End Navigation ---->
    <div id="tabnav" class="tabnav" style="margin-top:150px;">
	 <div class="container">
         <h2>ADMIN PANEL</h2>
         <br>
            <div class="tab-content">
                <div class="container">
                    <h4>ADD customer</h4>
                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                    <input style="width:250px;"class="form-control" type="text" placeholder="Enter first name" name="fname">
                    <br>
                    <input style="width:250px;"class="form-control" type="text" placeholder="Enter last name"name="lname">
                    <br>
                    <input style="width:250px;"class="form-control" type="email" placeholder="Enter email"name="email">
                    <br>
                    <input style="width:250px;"class="form-control" type="password" placeholder="Enter password"name="pass">
                    <br>
                    <input style="width:250px;"class="form-control" type="number" placeholder="Enter Phone Number"name="phone">
                    <br>
                    <input type="submit" value="ADD" class="btn btn-success">
                    </form>
                    <?php
                          if ($_SERVER["REQUEST_METHOD"] == "POST") 
                          {
                              $fname = (isset($_POST['fname']) ) ? $_POST['fname'] : '';

		                      $lname = (isset($_POST['lname']) ) ? $_POST['lname'] : '';

                            $email = (isset($_POST['email']) ) ? $_POST['email'] : '';

                              $pass = (isset($_POST['pass']) ) ? $_POST['pass'] : '';

                                $phone = (isset($_POST['phone']) ) ? $_POST['phone'] : '';
                              
		          			include 'dbh.php';

			                $sql="INSERT INTO customer(first_name,last_name,email,customer_pass,phone_number) VALUES ('$fname','$lname','$email','$pass','$phone')";

			                //$result= mysql_query($sql);
			                $retval = mysqli_query($conn ,$sql)or die(mysqli_error($conn));

			                if($retval==1)
                            {
			                	echo "Successfully Added";
			                	
                  					header("Location: admin.php");

			                 }    
			                else
                            {
			                	echo "Failed to query database ".mysqli_error($conn);
			                }
		          		
		          		
		              }
                    
                ?>
                </div>
                 
                 <hr>
                 <div class="container">
                    <h4>REMOVE customer</h4>
                     <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                     <input name="id" style="width:250px;"class="form-control" type="text" placeholder="Enter Customer id">
                    <br>
                    <input type="submit" value="REMOVE" class="btn btn-danger">
                     </form>
                    <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") 
                         {
		            	     $id = $_POST['id'];

		          			include 'dbh.php';

			                $sql="DELETE FROM customer WHERE customer_id='$id'";

			                //$result= mysql_query($sql);
			                if(mysqli_query($conn, $sql)){
                                echo "Records were deleted successfully.";
                            } else{
                                echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                            }
                         }
                     ?>
                 </div>
                 
                 <hr>
                 <div class="container">
                    <h4>Edit customer</h4>
                     <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                          <input style="width:250px;"class="form-control" type="text" placeholder="Enter customer id" name="id">
                         <br>
                     <input style="width:250px;"class="form-control" type="text" placeholder="Enter first name" name="fname">
                    <br>
                    <input style="width:250px;"class="form-control" type="text" placeholder="Enter last name" name="lname">
                    <br>
                    <input style="width:250px;"class="form-control" type="email" placeholder="Enter email"name="email">
                    <br>
                    <input style="width:250px;"class="form-control" type="password" placeholder="Enter password"name="pass">
                    <br>
                    <input style="width:250px;"class="form-control" type="number" placeholder="Enter Phone Number"name="phone">
                    
                     <br>
                      <input type="submit" value="EDIT" class="btn btn-info">
                     </form>
                    <?php
                                 if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $id =$_POST['$id'];
                         $fname = $_POST['fname'];
		            	     $lname = $_POST['lname'];
                                $email = $_POST['email'];
		                      $pass = $_POST['pass'];
                                $phone = $_POST['phone'];
		            	
                        include 'dbh.php';

                        //$sql="SELECT * from customer where customer_id = '$std'";
		          		

			                $sql="UPDATE customer SET first_name='$fname',last_name='$lname',email='$email',customer_pass='$pass',phone_number='$phone' WHERE id='$id'";

			                //$result= mysql_query($sql);
			                $sql="UPDATE admin SET admin_name='$name',admin_pass='$pass' WHERE admin_id='$id'";

			                //$result= mysql_query($sql);
			                $retval = mysqli_query($conn ,$sql)or die(mysqli_error($conn));

			                if ($conn->query($sql) === TRUE) {
                                    echo "Record updated successfully";
                                } else {
                                    echo "Error updating record: " . $conn->error;
                                }
                            }
		          		
		          		

                         ?>
                </div>
                 <hr>
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