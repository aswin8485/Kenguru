<?php

$conn=mysqli_connect("localhost","root","mango123")or die ("could not connect to mysql");

mysqli_select_db($conn, "kenguru")or die(mysqli_error($con));