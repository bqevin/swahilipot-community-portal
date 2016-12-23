<?php
ob_start();
require_once 'core/init.php';
?>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>SwahiliPotHub | LogIn</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

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
            <div class="panel-heading">
                <strong> Sign in to continue</strong>
            </div>
            <div class="panel-body">
            <?php
            

                $error ="";
                if (Input::exists()) {
                    if (Token::check(Input::get('token'))) {
                        $validate = new Validate();
                        $validation = $validate->check($_POST, array(
                            'username' => array('required' => true),
                            'password' => array('required' => true)
                            ));
                        if ($validation->passed()) {
                            //login User
                            $user = new User();
                            $remember = (Input::get('remember') === 'on') ? true : false;
                            $login = $user->login(Input::get('username'), Input::get('password'), $remember);
                            if ($login) {
                               // echo "Success";
                                echo "<script type='text/javascript'> window.location='profile.php';</script>";
                            } else {
                                echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Sorry!</strong> Wrong login details.</div>';
                            }
                        } else {
                            foreach ($validation->errors() as $error) {
                                echo $error, '<br>';
                            }
                        }
                    }
                }

                ?>

                <form role="form" action="" method="POST">
                    <fieldset>
                    <?php echo $error; ?>
                        <div class="row">
                            <div class="center-block">
                                <img class="profile-img img-circle"
                                    src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120" alt="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-10  col-md-offset-1 ">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="login glyphicon glyphicon-user"></i>
                                        </span> 
                                        <input class="form-control" placeholder="Email" name="username" type="text" autofocus required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-lock"></i>
                                        </span>
                                        <input class="form-control" placeholder="Password" name="password" type="password" value="" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                <div class="check">
                                    <label class="checkbox">
                                      <input type="checkbox" name="remember" checked=""><i></i>Remember my Password</label>
                                </div>
                                </div>
                                <div class="form-group">
                                <input type="hidden" name="token" value="<?php echo Token::generate();?>">
                                    <input type="submit" class="btn btn-lg btn-primary btn-block" name="Signin" value="Signin">
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
</body>
</html>