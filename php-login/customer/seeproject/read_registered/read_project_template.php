<?php
// display the table if the number of projects retrieved was greater than zero
if($num>0){
 
    echo "<table class='table table-hover table-responsive table-bordered'>";
 
    // table headers
    echo "<tr>";
        echo "<th>Firstname</th>";
        
        echo "<th>Project/Event name</th>";
      
        echo "<th>Email</th>";
	echo "<th>Location</th>";
		echo "<th>Contact Number</th>";
	
	
    echo "</tr>";
 
    // loop through the project records
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
 
        // display project/event details
        echo "<tr>";
            echo "<td>{$firstname}</td>";
			
            echo "<td>{$name}</td>";
         
            echo "<td>{$email}</td>";
	   echo "<td>{$location}</td>";
            echo "<td>{$contact_number}</td>";
  
	
        echo "</tr>";
        }
 
    echo "</table>";
 
    $page_url="project_view.php?";
      $total_rows = $project->countAll();
 
  
 
    
}
 
// if no projects
else{
    echo "<div class='alert alert-danger'>
        <strong>No Projects found.</strong>
    </div>";
}
?>