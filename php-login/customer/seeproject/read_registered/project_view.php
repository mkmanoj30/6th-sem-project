<?php
// core configuration
include_once "../../../config/core.php";
 
// check if logged in as admin
include_once "../../../login_checker.php";
 
// include classes
include_once '../../../config/database.php';
 $x=$_SESSION['firstname'];

include   'project.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// initialize objects
$project = new Project($db);
 
// set page title
$page_title = "Projects registered to be participated by you";

 
// include page header HTML
include_once "../../../layout_head.php";
 
echo "<div class='col-md-12'>";
 
    // read all projects from the database
    $stmt = $project->readAll($from_record_num, $records_per_page);
 
    // count retrieved users
    $num = $stmt->rowCount();
 
    // to identify page for paging
    $page_url="project_view.php?";
 
    // include products table HTML template
    include_once "read_project_template.php";
 
echo "</div>";
 
// include page footer HTML
include_once "layout_foot.php";
?>