<?php

ob_start();
require_once 'core/init.php';
require_once 'includes/templates/header.php';
require_once 'functions/functions.php';

$message = "";
$admin = Database::getInstance()->query("SELECT * FROM admin");

if (!$admin->count()) {
    echo "No Admin(s)!";
    die();
}

if (Session::exists('home')) {
    echo "<p>";
    echo Session::flash('home');
    echo "</p>";
}

//Register User
if (isset($_POST["add-member"])) {

	$validate = new Validate();
	$email = Input::get("email");

	$items = array(
	  'email' => array('unique' => 'users')
	        );

	if($validation = $validate->check($_POST, $items)){

		if($error = $validation->errors()){

			foreach ($error as $key => $value) {
				$value = strtoupper($value);
				$message = "<p class='alert alert-danger'>".$value."</p>";
			}
		}
		else{

			$fname = Input::get("fname")." ".Input::get("lname");
			$gender = Input::get("gender");
			$category = Input::get("category");
			$regno = Input::get("regno");

			$regno = getRegno($regno);

			try{

			  	if (addMember(array(
			            'name' => $fname,
			            'email' => $email,
			            'reg_no' => $regno,
			            'gender' => $gender,
			            'category' => $category,
			            'created' => date('Y-m-d H:i:s')
			            ))) {

				    sendActivationLink($regno, $fname, $email);
				   	$message = "<p class='alert alert-success'>Member Added Successfully</p>";
				   	//To be Implemented on Ajax
		    
				}
				else{
					$message = "<p class='alert alert-danger'>There was a problem creating this user account</p>";
				}
			}
			catch(Exception $e){
			    die($e->getMessage());
			    //Alternative is rediect user to a failure page
			}
			// $_POST = array();
		}		
	}
}

//Editing and Deletting Member Details 
if(isset($_GET['delete'])){
	$userid = $_GET['delete'];

	$where = array("id", "=", $userid);
	if($admin->delete("users", $where)){
    
		$message = "<p class='alert  alert-success'> User Successfully Deleted!</p>";
	}else{
  
		$message = "<p class='alert  alert-danger'> ERROR: Could Not Deleted User!</p>";
	}
	//unset($message);
}

if(isset($_GET['edit'])){
	$userid = $_GET['edit'];

	header("Location: edituser.php?id=".$userid."");
	
}

$user = new User;
if ($user->isLoggedIn()) { 

	require_once 'includes/templates/menu.php';
	require_once 'includes/templates/sidebar.php';

?>
<div class="dash-container">
<?php  
require_once 'includes/templates/dashboardhead.php';

echo $message;
// echo $msg;
require_once 'includes/views/members.php';
require_once 'includes/views/register.php';


?>

</div>


<?php 
require_once 'includes/templates/footer.php';
 } 
else{
    header('Location: login.php');
} 
?>