<?php
require_once 'url.php';

$session = Config::get('session/session_name');

if(isset($session) && !empty($session)){
	
	header("Location: index.php");
}
else{
	
	header("Location: ".$baseurl."login.php");

}
?>