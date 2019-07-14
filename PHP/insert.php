<?php
if(isset($_POST['submit'])) {
$s_no = $_POST['s_no'];
$name = $_POST['name'];
$class = $_POST['class'];
$dob = $_POST['dob'];

$dbconnect = mysqli_connect('localhost','root','','sample');
$sql = "insert into sampledata(s_no,name,class,dob) values('$s_no','$name','$class','$dob')";

$run=mysqli_query($dbconnect,$sql);
if($run == TRUE){
	echo "Data inserted succesfully";
}
else
{
	echo "Failed";
}

}

?>
<html>
  <head>      
  </head>
  <body>
       <a href="data_entry.html">Click to go back</a>
  </body>
</html>