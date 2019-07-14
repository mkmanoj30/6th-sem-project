<?php
$con=mysqli_connect("localhost","root","","sample");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM sampledata");
echo "<table border='1'>
<tr>
<th>Name</th>
<th>Class</th>
<th>S_no</th>
<th>D.O.B</th>
</tr>";


while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['name'] . "</td>";
echo "<td>" . $row['class'] . "</td>";
echo "<td>" . $row['s_no'] . "</td>";
echo "<td>" . $row['dob'] . "</td>";
echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>