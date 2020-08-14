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
                   <h4>Add admin</h4>
                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                        <input name="name" style="width:250px;"class="form-control" type="text" placeholder="Enter name">
                        <br>
                        <input name="pass" style="width:250px;"class="form-control" type="text" placeholder="Enter password">
                        <br>
                        <input type="submit" value="ADD" class="btn btn-success">
                    
                    <?php
                          if ($_SERVER["REQUEST_METHOD"] == "POST") 
                          {
		            	     $name = $_POST['name'];
		            	     $pass = $_POST['pass'];
		            	
                              
		          			include 'dbh.php';

			                $sql="INSERT INTO admin(admin_name,admin_pass) VALUES ('$name','$pass')";

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
                </form>
                </div>
                <hr>
                 <div class="container">
                    <h4>Remove admin</h4>
                      <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                         <input name="id" style="width:250px;"class="form-control" type="text" placeholder="Enter admin id">
                        <br>
                        <input type="submit" value="REMOVE" class="btn btn-danger">
                     
                     <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") 
                         {
		            	     $sql = "DELETE FROM admin WHERE admin_id='$id'";
                            if(mysqli_query($conn, $sql)){
                                echo "Records were deleted successfully.";
                            } else{
                                echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                            }
                         }
                     ?>
                    </form>
                </div>
                <hr>
                 <div class="container">
                    <h4>Edit admin</h4>
                     <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                     <input name="id"style="width:250px;"class="form-control" type="text" placeholder="Enter id">
                         <br>
                     <input name="name"style="width:250px;"class="form-control" type="text" placeholder="Enter name">
                    <br>
                    <input name="pass"style="width:250px;"class="form-control" type="text" placeholder="Enter password">
                     <br>
                      <input type="submit" value="EDIT" class="btn btn-info">
                        <?php
                                 if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $id = $_POST['id'];
		            	$name = $_POST['name'];
		            	$pass = $_POST['pass'];
                                     
                        include 'dbh.php';

                        //$sql="SELECT * from customer where customer_id = '$std'";
		          		

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
                     </form>
                </div>
                <hr>
            </div>
   

<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
	<script src="js/wow.min.js"></script>
	<script>
	new WOW().init();
	</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>