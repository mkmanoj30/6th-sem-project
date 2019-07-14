<?php
$dbconnect = mysqli_connect('localhost','root','','sample');
if(mysqli_connect_errno($dbconnect)){
	echo "failed ";
}
else
{
	echo "succes";
}
?>
