<?php
// require_once 'url.php';
require_once "core/init.php";
require_once 'includes/templates/header.php';

$db = Database::getInstance();

$GLOBALS['email'] = "";
if(isset($_GET["email"])){


	$GLOBALS['email'] = $_GET["email"];
	
}


$error ="";
if(isset($_POST['Signin'])){
    $pass1 = $_POST['newpassword'];
    $pass2 = $_POST['conpassword'];

    if($pass1 != $pass2){
        $error = '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Sorry!</strong> Password Dont Match.</div>';
        // exit();
    }

    if (Input::exists()) {
        if (Token::check(Input::get('token'))) {
            $validate = new Validate();
            $validation = $validate->check($_POST, array(
                'newpassword' => array('required' => true),
                'conpassword' => array('required' => true)
                ));

            //Password Encryption Needed.

            if ($validation->passed()) {
                $salt = Hash::salt(32);
                $password = Hash::make(Input::get('newpassword'), $salt);
                
                $fields = array('status'=> 1, 'password' => "\"".$password."\"",  'salt'=> "\"".$salt."\"");
                $email = $GLOBALS['email'];
                $setpassword = $db->update('users', $email, $fields);
                if ($setpassword) {
                    
                    echo "<script type='text/javascript'> window.location='login.php';</script>";
                } 
            } else {
                foreach ($validation->errors() as $error) {
                    echo $error, '<br>';
                }
            }
        }
    }
}


?>


<html lang="en">
<head>
    <meta charset="utf-8">

    <title>SwahiliPotHub</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" >

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/custom.css">


</head>
<body>
<div class="container" style="margin-top:40px">
<div class="row">
    <div class="col-sm-6 col-md-4 col-md-offset-4">
        <div class="panel panel-default">
            <div class="panel-heading password-header">
                <strong> Set Password To Continue</strong>
            </div>
            <div class="panel-body">
           <!--  <?php
                // require_once 'core/init.php';

                ?> -->

                <form role="form" action="" method="POST">
                    <fieldset>
                    <?php echo $error; ?>
                        <div class="row">
                            <div class="center-block">
                                <img class="profile-img img-circle"
                                    src="img/swahilipotlogo.png" alt="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-10  col-md-offset-1 ">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="login glyphicon glyphicon-user"></i>
                                        </span> 
                                        <input id="pass1" class="form-control" placeholder="New Password" name="newpassword" type="password" autofocus required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-lock"></i>
                                        </span>
                                        <input id="pass2" class="form-control" placeholder="Confirm Password" name="conpassword" type="password" onkeyup="checkPass(); return false;" value="" required>
                                    </div><span id="confirmMessage" class="confirmMessage"></span>
                                </div>
                                <div class="form-group">
                                <!-- <div class="check">
                                    <label class="checkbox">
                                      <input type="checkbox" name="remember" checked=""><i></i>Remember my Password</label>
                                </div> -->
                                </div>
                                <div class="form-group">
                                <input type="hidden" name="token" value="<?php echo Token::generate();?>">
                                    <input type="submit" class="btn btn-primary btn-block btn-login" name="Signin" value="Signin">
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
            <!-- <div class="panel-footer ">
                Don't have an account! <a href="#" onClick=""> Sign Up Here </a>
            </div> -->
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
	function checkPass()
{
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field 
    //and the confirmation field
    if(pass1.value == pass2.value){
        //The passwords match. 
        //Set the color to the good color and inform
        //the user that they have entered the correct password 
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Passwords Match!"
    }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!"
    }
}  



</script>
</body>
</html>