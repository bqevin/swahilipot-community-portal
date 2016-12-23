<?php
require_once "core/init.php";
require_once 'includes/templates/header.php';

$db = Database::getInstance();

if(isset($_GET["email"])){

	$email = $_GET["email"];
	$fields = array("status" => 1);

	if ($db->update("users", $email, $fields)) {
		echo "<p class='alert  alert-danger' style='width:80%;margin:100px auto; text-align:center;'> You Have Succesfully Activated Your Account.<a href='#'>log in</a> Log In</pre>";
	}
}
?>