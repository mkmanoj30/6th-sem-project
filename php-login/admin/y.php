<?php
// core configuration
include_once "../config/core.php";


echo "<link rel='stylesheet' type='text/css' href='../libs/css/button.css'>";
 $x=$_SESSION['firstname'];
// set page title
$page_title="Admin:$x";
// check if logged in as admin
include_once "login_checker.php";

 
// include page header HTML
include 'layout_head.php';
 
   include_once 'seeproject/project_view.php';
 
// include page footer HTML
include_once 'layout_foot.php';
?>