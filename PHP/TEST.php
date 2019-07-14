<?php
$con=mysqli_connect("localhost","root","","sample");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// Perform queries 
mysqli_query($con,"INSERT INTO sampledata (s_no,name,class,dob) 
VALUES ($s_no,'$name','$class','$dob')");


?>