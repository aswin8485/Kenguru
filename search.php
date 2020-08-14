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

        <link rel="stylesheet" type="text/css" href="search.css">
        
      <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
      <link rel="icon" href="images/logo.ico" type="image/x-icon">
  </head>
    <style>
        body{
            background: url(images/search.jpg) no-repeat;
            background-size: cover;
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
          <h1>Search</h1>
        </div>
</div>

<!-- search -->

<div class="container" style="background-color:white; opacity:0.9;">
  <div class="well well-sm">
    
    <form action="search.php" method="post">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search" name="svalue" />
          
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
<br>
      <strong>Display</strong>
      
    <div class="btn-group">
      <a href="#" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list">
            </span>List</a> <a href="#" id="grid" class="btn btn-default btn-sm"><span
                class="glyphicon glyphicon-th"></span>Grid</a>
    </div>
  </div>




  <div id="products" class="row list-group">

<?php
        if(isset($_POST['svalue'])){
          $svalue = $_POST['svalue'];
        }
        else{
          $svalue = $_SESSION['svalue'];
        }
        
        if($svalue==NULL){
          // echo "<center>No Search Results</center>";


            include 'dbh.php';

            $sql="SELECT * from storage" ;
            
            $result= mysqli_query($conn ,$sql)or die(mysqli_error($conn));
            $count=mysqli_num_rows($result);


            if($count==0){
              echo "No Search Results";
            }
            
            else{
                
                while($row=mysqli_fetch_array($result)){

                  if (is_null($row['rentee_id'])) {
                    
                  

                  $storageID = $row['storage_id'];
                  
                  $path = './UploadFolder'; 
                  $files = glob($path.'/'.$storageID.'_*.jpg');

                  $picture=null;

                  $addressID = $row['address2_id'];
                  $sql3="SELECT * from address where  address_id='$addressID'" ;
                  $result3= mysqli_query($conn ,$sql3)or die(mysqli_error($conn));
                  $row3=mysqli_fetch_assoc($result3);

                  foreach($files as $file){
                       $picture=$file;
                    }
                    
                    echo "<div class='item  col-xs-4 col-lg-4'>
                            <div class='thumbnail'>
                              <img style='height:250px; width:400px;' class='group list-group-image' src=".$picture." alt='No Image Given' />
                              <div class='caption'>
                                <h4 class='group inner list-group-item-heading'>
                                              ".$row['storage_name']."</h4>
                                <p class='group inner list-group-item-text'>
                                  <strong>Availablility<tab1></tab1>:</strong> ".$row['start_date']." to ".$row['stop_date']." <br>
                                  <strong>Storage Size<tab2></tab2>: </strong>".$row['storage_size']." <br>
                                  <strong>Storage Type<tab3></tab3>:</strong> ".$row['storage_type']." <br>
                                  <strong>Address<tab4></tab4>: </strong>".$row3['street_colony']." 
                                  </p>
                                <div class='row'>
                                  <div class='col-xs-12 col-md-6'>
                                    <p class='lead'>
                                      ₹".$row['rent']." / Week</p>
                                  </div>
                                  <div class='col-xs-12 col-md-6'>
                                    <a class='btn btn-success' href='storageshow.php?bvalue=".$row['storage_id']."'>More Details</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>";
                        }
                    }
              }
        }
        else{

            include 'dbh.php';

            $sql="SELECT * from storage where  storage_name LIKE '%$svalue%' OR payment_method LIKE '%$svalue%'" ;

            $result= mysqli_query($conn ,$sql)or die(mysqli_error($conn));
            $count=mysqli_num_rows($result);


            if($count==0){
              echo "No Search Results";
            }
            
            else{

                if (is_null($row['rentee_id'])) {
                
                while($row=mysqli_fetch_array($result)){

                  $storageID = $row['storage_id'];
                  
                  $path = './UploadFolder'; 
                  $files = glob($path.'/'.$storageID.'_*.jpg');

                  $picture=null;

                  $addressID = $row['address2_id'];
                  $sql3="SELECT * from address where  address_id='$addressID'" ;
                  $result3= mysqli_query($conn ,$sql3)or die(mysqli_error($conn));
                  $row3=mysqli_fetch_assoc($result3);

                  foreach($files as $file){
                       $picture=$file;
                    }
                    
                    echo "<div class='item  col-xs-4 col-lg-4'>
                            <div class='thumbnail'>
                              <img style='height:250px; width:400px;' class='group list-group-image' src=".$picture." alt='No Image Given' />
                              <div class='caption'>
                                <h4 class='group inner list-group-item-heading'>
                                              ".$row['storage_name']."</h4>
                                <p class='group inner list-group-item-text'>
                                  <strong>Availablility :</strong> ".$row['start_date']." to ".$row['stop_date']." <br>
                                  <strong>Storage Size : </strong>".$row['storage_size']." <br>
                                  <strong>Storage Type :</strong> ".$row['storage_type']." <br>
                                  <strong>Address : </strong>".$row3['street_colony']." 
                                  </p>
                                <div class='row'>
                                  <div class='col-xs-12 col-md-6'>
                                    <p class='lead'>
                                      ₹".$row['rent']." / Week</p>
                                  </div>
                                  <div class='col-xs-12 col-md-6'>
                                    <a class='btn btn-success' href='storageshow.php?bvalue=".$row['storage_id']."'>More Details</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>";
                    }
                  }
              }
            
          }
  ?>
<!--         <div class="item  col-xs-4 col-lg-4">
          <div class="thumbnail">
            <img class="group list-group-image" src="http://placehold.it/400x250/000/fff" alt="" />
            <div class="caption">
              <h4 class="group inner list-group-item-heading">
                            Product title</h4>
              <p class="group inner list-group-item-text">
                Product description... Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
              <div class="row">
                <div class="col-xs-12 col-md-6">
                  <p class="lead">
                    $21.000</p>
                </div>
                <div class="col-xs-12 col-md-6">
                  <a class="btn btn-success" href="http://www.jquery2dotnet.com">Add to cart</a>
                </div>
              </div>
            </div>
          </div>
        </div>
 -->
        
  </div>
</div>

<!-- end of search -->






        
        <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
        <script type="text/javascript" src="js/searcher.js"></script>
        <script src="js/wow.min.js"></script>
    <script>
    new WOW().init();
    </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
      <br><br><br>
        <div class="footer">
            Kenguru &#169 2017 - www.kenguru.in
        
        </div>
  </body>
</html>