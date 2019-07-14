<?php
// core configuration
include_once "../../config/core.php";

// set page title
$page_title = "Register Events and Projects";
 
// include login checker
$require_login=true;
include_once "../../login_checker.php";
 



// include classes
include_once '../../config/database.php';
include_once 'project.php';
$x= $_SESSION['firstname'];

 
// include page header HTML
include_once "../../layout_head.php";
 
echo "<div class='col-md-12'>";
 
   // if form was posted
if($_POST){
 
    // get database connection
    $database = new Database();
    $db = $database->getConnection();
 
    // initialize objects
    $project = new Project($db);
    
	// set values to object properties
$project->name=$_POST['name'];
$project->creater_name=$x;
$project->location=$_POST['location'];
$project->contact_number=$_POST['contact_number'];
$project->email1=$_POST['email1'];
$project->members=$_POST['members'];
$project->requirements=$_POST['requirements'];
$project->start=$_POST['start'];
$project->ending=$_POST['ending'];
 
// create the projects
if($project->create() && $project->create2()){
 
    echo "<div class='alert alert-success'>";
        echo "Successfully registered.";
    echo "</div>";
 
    // empty posted values
    $_POST=array();
 
}else{
    echo "<div class='alert alert-danger' role='alert'>Unable to register. Please try again.</div>";
}
}
?>
<form action='register_project.php' method='post' id='register'>
 
    <table class='table table-responsive'>
        <tr>
            <td class='width-30-percent'>Name of Project</td>
            <td><input type='text' name='name' class='form-control' required value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name'], ENT_QUOTES) : "";  ?>" /></td>
        </tr>
 
        <tr>
            <td>Contact Number</td>
            <td><input type='number' name='contact_number' class='form-control' required value="<?php echo isset($_POST['contact_number']) ? htmlspecialchars($_POST['contact_number'], ENT_QUOTES) : "";  ?>" /></td>
        </tr>
		<tr>
            <td>Email</td>
            <td><input type='text' name='email1' class='form-control' required value="<?php echo isset($_POST['email1']) ? htmlspecialchars($_POST['email1'], ENT_QUOTES) : "";  ?>" /></td>
        </tr>
		<tr>
            <td>Location</td>
            <td><input type='text' name='location' class='form-control' required value="<?php echo isset($_POST['location']) ? htmlspecialchars($_POST['location'], ENT_QUOTES) : "";  ?>" /></td>
        </tr>
			
		 <tr>
            <td>Max members required</td>
            <td><input type='number' name='members' class='form-control' required value="<?php echo isset($_POST['members']) ? htmlspecialchars($_POST['members'], ENT_QUOTES) : "";  ?>" /></td>
        </tr>
        <tr>
            <td>Requirements</td>
            <td><input type='text' name='requirements' class='form-control' required value="<?php echo isset($_POST['requirements']) ? htmlspecialchars($_POST['requirements'], ENT_QUOTES) : "";  ?>" /></td>
        </tr>
		<tr>
            <td>Starting Date</td>
            <td><input type='date' name='start' class='form-control' required value="<?php echo isset($_POST['start']) ? htmlspecialchars($_POST['start'], ENT_QUOTES) : "";  ?>" /></td>
        </tr>
		<tr>
            <td>Ending Date(Expected)</td>
            <td><input type='date' name='ending' class='form-control' required value="<?php echo isset($_POST['ending']) ? htmlspecialchars($_POST['ending'], ENT_QUOTES) : "";  ?>" /></td>
        </tr>
 
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">
                    <span class="glyphicon glyphicon-plus-sign"></span> Register Project
                </button>
            </td>
        </tr>
 
    </table>
</form>
<?php
echo "</div>";
 
// include page footer HTML
include_once "layout_foot.php";
?>