<?php
$name = $_GET['name'];


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

// sql to delete a record
$sql = "DELETE FROM projects WHERE name='$name'";

if ($conn->query($sql) === TRUE) {
    header("Location: ../../admin/y.php");
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();

?>