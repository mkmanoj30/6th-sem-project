<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "php_login_system";
 include_once '../../../navigation.php'; 
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT firstname, lastname ,name,email FROM register";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
    // output data of each row
    echo "<table class='table table-hover table-responsive table-bordered'>";
 
    // table headers
    echo "<tr>";
        echo "<th>Project Name</th>";
        echo "<th>Location</th>";
        echo "<th>Members Required/Max Attendance</th>";
        echo "<th>Requirements</th>";
      
    echo "</tr>";
 
    // loop through the project records
       
 
        // display project/event details
        echo "<tr>";
            echo "<td> ".$row['firstname']."</td>";
			echo "<td>".$row['lastname']."</td>";
            echo "<td>".$row['name']."</td>";
           
            echo "<td>".$row['email']."</td>";
            
	 echo "</tr>";
}}
    
else {
    echo "0 results";
}
$conn->close();
// include page footer HTML
include_once "layout_foot.php";
?>