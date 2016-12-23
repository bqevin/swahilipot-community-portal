<?php

	require_once("snippets/session.php");
	
	require_once("snippets/class.user.php");
	$auth_user = new USER();
	
	
	$user_id = $_SESSION['user_session'];
	
	$stmt = $auth_user->runQuery("SELECT * FROM users WHERE id=:user_id");
	$stmt->execute(array(":user_id"=>$user_id));
	
	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

?>
<?php include 'snippets/header.php' ?>  
    	    
<div class="container-fluid" style="margin-top:80px;">
	

</div>

<?php include 'snippets/footer.php' ?> 

<script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>