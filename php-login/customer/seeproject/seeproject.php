<?php
// core configuration
include_once "../../config/core.php";

echo "<link rel='stylesheet' type='text/css' href='../../libs/css/button.css'>";
 
// set page title
$page_title="See Projects";
 
// include login checker
$require_login=true;
include_once "../../login_checker.php";
include_once '../../config/database.php';

 
// include page header HTML
include_once '../../layout_head.php';
 
echo "<div class='col-md-12'>";
 
    // to prevent undefined index notice
    $action = isset($_GET['action']) ? $_GET['action'] : "";
 
    // if login was successful
    if($action=='login_success'){
        echo "<div class='alert alert-info'>";
            echo "<strong>Hi " . $_SESSION['firstname'] . ", welcome back!</strong>";
        echo "</div>";
    }
 
    // if user is already logged in, shown when user tries to access the login page
    else if($action=='already_logged_in'){
        echo "<div class='alert alert-info'>";
            echo "<strong>You are already logged in.</strong>";
        echo "</div>";
    }
 
    // content once logged in i.e on this page
    echo "<div class='alert alert-info'>";
        echo "<form> <button formaction='customer/seeproject/project_view.php' class='button' style='vertical-align:middle'><span>Projects</span></button> </form>";
		echo "<form> <button formaction='customer/seeproject/register_project.php' class='button' style='vertical-align:middle'><span>Register</span></button> </form>"
	echo "</div>";
 
echo "</div>";
 
// footer HTML and JavaScript codes
include '../../layout_foot.php';
?>