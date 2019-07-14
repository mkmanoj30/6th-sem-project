<?php
include_once "../../config/core.php";
$x= $_SESSION['firstname'];
$y=$_SESSION['lastname'];

//get details
$email = $_GET['email'];
$name = $_GET['name'];
$location = $_GET['location'];
$contact_number = $_GET['contact_number'];


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "php_login_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//sql to check if already registered

$que =mysqli_query($conn,"SELECT firstname,email  from register where email='$email' AND firstname='$x'");


if(mysqli_num_rows($que)>0)
{
   $message = "You have already registered";
  echo "<script type='text/javascript'>alert('$message');</script>";
   header( "refresh:1;url=project_view.php" );
 $conn->close();
	
}
//sql to register
else{
$sql="INSERT INTO register (firstname,lastname,name,email,location,contact_number)  VALUES ('$x','$y','$name','$email','$location','$contact_number')";


if ($conn->query($sql) === TRUE) {
	$message = "You have succesfully registered";
  echo "<script type='text/javascript'>alert('$message');</script>";
    header( "refresh:1;url=project_view.php" );
	$conn->close();

} else {
    echo "Error during Registration : " . $conn->error;
	$conn->close();

}
}



?>