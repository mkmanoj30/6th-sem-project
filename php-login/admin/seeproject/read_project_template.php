<?php
// display the table if the number of projects retrieved was greater than zero
if($num>0){
 
    echo "<table class='table table-hover table-responsive table-bordered'>";
 
    // table headers
    echo "<tr>";
        echo "<th>Project Name</th>";
        echo "<th>Location</th>";
        echo "<th>Members Required/Max Attendance</th>";
        echo "<th>Requirements</th>";
        echo "<th>Email</th>";
		echo "<th>Contact Number</th>";
	echo "<th>Remove Project</th>";
    echo "</tr>";
 
    // loop through the project records
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
 
        // display project/event details
        echo "<tr>";
            echo "<td>{$name}</td>";
			echo "<td>{$location}</td>";
            echo "<td>{$members}</td>";
            echo "<td>{$requirements}</td>";
            echo "<td>{$email}</td>";
            echo "<td>{$contact_number}</td>";
	echo "<td><a href='seeproject/delete.php?name=".$row['name']."'>Delete</a></td>";
	
        echo "</tr>";
        }
 
    echo "</table>";
 
    $page_url="project_view.php?";
    $total_rows = $project->countAll();
 
    // actual paging buttons
    include_once 'paging.php';
}
 
// if no projects
else{
    echo "<div class='alert alert-danger'>
        <strong>No Projects found.</strong>
    </div>";
}
?>