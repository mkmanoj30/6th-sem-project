<?php
// core configuration
include_once "config/core.php";

echo "<link rel='stylesheet' type='text/css' href='libs/css/button.css'>";
 
// set page title
$x= $_SESSION['firstname'];
$page_title="Welcome ". $x;
 
// include login checker
$require_login=true;
include_once "login_checker.php";
 
// include page header HTML
include_once 'layout_head.php';
 
echo "<div class='col-md-12'>";
 
    // to prevent undefined index notice
    $action = isset($_GET['action']) ? $_GET['action'] : "";
 
    // if login was successful
    {
        echo "<div class='alert alert-info'>";
            echo "<strong> ". $_SESSION['firstname'] . "'s Dashboard</strong>";
        echo "</div>";
    }
 
    // if user is already logged in, shown when user tries to access the login page
    if($action=='already_logged_in'){
        echo "<div class='alert alert-info'>";
            echo "<strong>You are already logged in.</strong>";
        echo "</div>";
    }
 
    // content once logged in
    echo "<div class='alert alert-success'>";
        echo "<form> <button formaction='customer/seeproject/project_view.php' class='button' style='vertical-align:middle'><span>Events</span></button> <button formaction='customer/seeproject/register_project.php' class='button' style='vertical-align:middle'><span>Register</span></button> <button formaction='customer/seeproject/read_registered/project_view.php' class='button' style='vertical-align:middle'><span>Registered</span></button> </form>";
    echo "</div>";
 
echo "</div>";
 
// footer HTML and JavaScript codes
include 'layout_foot.php';
?>