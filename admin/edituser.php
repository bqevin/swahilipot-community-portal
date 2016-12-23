<?php
require_once 'core/init.php';
require_once 'includes/templates/header.php';
require_once 'functions/functions.php';
// require_once 'check.php';

$message = "";
// $user = Database::getInstance()->query("SELECT * FROM admin");
// if (!$user->count()) {
//     echo "No Admin(s)! Add Admin For the System";
// }

// if (Session::exists('home')) {
//     echo "<p>";
//     echo Session::flash('home');
//     echo "</p>";
// }

// if(isset($_GET['delete'])){
// 	$userid = $_GET['delete'];

// 	$where = array("id", "=", $userid);
// 	if($user->delete("users", $where)){
// 		$message = "<p class='alert  alert-success'> User Successfully Deleted!</p>";
// 	}else{
// 		$message = "<p class='alert  alert-danger'> ERROR: Could Not Deleted User!</p>";
// 	}
	
// }
// if(isset($_GET['edit'])){
// 	$userid = $_GET['edit'];

// 	$where = array("id", "=", $userid);
// 	$data = $user->get("users", $where);

// 	getmemberDetails($data);
// 	header('Location: edituser.php');
	
// }

$user = new User;
if ($user->isLoggedIn()) { 

	require_once 'includes/templates/menu.php';
	require_once 'includes/templates/sidebar.php';

?>
<div class="dash-container">
<?php  
require_once 'includes/templates/dashboardhead.php';

if(empty($_GET['id'])){
	echo "<p class='alert  alert-warning' style='width:80%;margin:100px auto; text-align:center;'>No User is selected! <a class='alert-link' href='index.php'>Select a User</a> to Edit.</pre>";
	exit();
}
require_once 'includes/views/edituserview.php';
echo $message;
// require_once '../includes/views/members.php';
require_once 'includes/views/register.php';


?>

</div>


<?php 
require_once 'includes/templates/footer.php';
 } 
else{
    echo "<p class='alert  alert-danger' style='width:80%;margin:100px auto; text-align:center;'> You need to <a class='alert-link' href='login.php'>log in</a> as an Admin</pre>";
} ?>