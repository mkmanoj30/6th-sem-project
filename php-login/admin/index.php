<?php
// core configuration
include_once "../config/core.php";


echo "<link rel='stylesheet' type='text/css' href='../libs/css/button.css'>";
// check if logged in as admin
include_once "login_checker.php";
 $x=$_SESSION['firstname'];
// set page title
$page_title="Admin: $x";
 
// include page header HTML
include 'layout_head.php';
 
    echo "<div class='col-md-12'>";
 
        // get parameter values, and to prevent undefined index notice
        $action = isset($_GET['action']) ? $_GET['action'] : "";
 
        // tell the user he's already logged in
        if($action=='already_logged_in'){
            echo "<div class='alert alert-info'>";
                echo "<strong>You</strong> are already logged in.";
            echo "</div>";
        }
 
        else if($action=='logged_in_as_admin'){
            echo "<div class='alert alert-info'>";
                echo "<strong>You</strong> are logged in as admin.";
            echo "</div>";
        }
 
        echo "<div class='alert alert-info'>";
            echo "<form> <button formaction='x.php' class='button' style='vertical-align:middle'><span>Users</span></button><button formaction='y.php' class='button' style='vertical-align:middle'><span>Projects</span></button>  </form>";
        echo "</div>";
 
    echo "</div>";
 
// include page footer HTML
include_once 'layout_foot.php';
?>