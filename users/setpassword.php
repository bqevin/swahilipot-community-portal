<?php
session_start();
require_once('snippets/class.user.php');
$user = new USER();

if($user->is_loggedin()!="")
{
	$user->redirect('home.php');
}

if(isset($_POST['btn-signup']))
{
	$umail = strip_tags($_POST['txt_umail']);
	$upass = strip_tags($_POST['txt_upass']);	

	if($umail=="")	{
		$error[] = "provide email id !";	
	}
	else if(!filter_var($umail, FILTER_VALIDATE_EMAIL))	{
	    $error[] = 'Please enter a valid email address !';
	}
	else if($upass=="")	{
		$error[] = "provide password !";
	}
	else if(strlen($upass) < 6){
		$error[] = "Password must be atleast 6 characters";	
	}
	else
	{
		try
		{
			$stmt = $user->runQuery("SELECT * FROM users WHERE email=:umail");
			$stmt->execute(array(':umail'=>$umail));
			$row=$stmt->fetch(PDO::FETCH_ASSOC);
				
			// if($row['user_name']==$uname) {
			// 	$error[] = "sorry username already taken !";
			// }
			if($row['email']==$umail) {
				$error[] = "sorry email id already taken !";
			}
			else
			{
				if($user->register($umail,$upass)){	
					$user->redirect('edit-profile.php?joined');
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}	
}

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Swahilipot Hub : Sign up</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
<link rel="stylesheet" href="snippets/style.css" type="text/css"  />

</head>
<body >

<div class="signin-form">

<div class="container">
    	
        <form method="post" class="form-signin">
            <h2 class="form-signin-heading">Set your password here...</h2><hr />
            <?php
			if(isset($error))
			{
			 	foreach($error as $error)
			 	{
					 ?>
                     <div class="alert alert-danger">
                        <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
                     </div>
                     <?php
				}
			}
			else if(isset($_GET['joined']))
			{
				 ?>
                 <div class="alert alert-info">
                      <i class="glyphicon glyphicon-log-in"></i> &nbsp; Passwordd successfully set <a href='index.php'>login</a> here
                 </div>
                 <?php
			}
			?>
           <!--  -->
            <!-- <div class="form-group">
            <input type="text" class="form-control" name="txt_umail" placeholder="admin@example.com" value="<?php if(isset($error)){echo $umail;}?>" />
            </div> -->
            <div class="form-group">
            	<input type="password" class="form-control" name="txt_upass" placeholder="Enter Password" />
            </div>
            <div class="form-group">
            	<input type="password" class="form-control" name="txt_upass__confirm" placeholder="Confirm Password" />
            </div>
            <div class="clearfix"></div><hr />
            <div class="form-group">
            	<button type="submit" class="btn btn-primary" name="btn-signup">
                	<i class="glyphicon glyphicon-open-file"></i>&nbsp;SET PASSWORD
                </button>
            </div>
            <br />
            <label>have an account ! <a href="index.php">Sign In</a></label>
        </form>
       </div>
</div>

</div>

</body>
</html>