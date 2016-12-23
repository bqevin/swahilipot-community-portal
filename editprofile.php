<?php
require_once 'core/init.php';
require_once 'functions/functions.php';
ini_set("display_errors", 1);
error_reporting(E_ALL);

$db = Database::getInstance();

$id = "";
$fname = "";
$lname = "";
$regno = "";
$email = "";
$gender = "";
$category = "";
$st = "";
$tel = "";
$bounties = "";
$website = "";
$bio = "";
$created = "";
$address = "";

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $userid = $_GET['id'];
    $where = array("id", "=", $userid);
    $data = $db->get("users", $where)->results();
    // var_dump($data);

    foreach ($data as $value) {
        $user  = array(
                    "id" => ($value->id),
                    "name" => ($value->name),
                    "email" => ($value->email),
                    "gender" => ($value->gender),
                    "regno" => ($value->reg_no),
                    "category" => ($value->category),
                    "status" => ($value->status),

                    "tel" => ($value->tel),
                    "bounties" => ($value->bounties),
                    "website" => ($value->website),
                    "created" => ($value->created),
                    "bio" => ($value->bio),
                    "address" => ($value->address)
                );
        extract($user);
        //get status as lable
        $st = getStatus($status);

        //Set Gender Strings
        if($gender){
            switch ($gender) {
                case 'M':
                    $gender = 'Male';
                    break;
                
                case 'F':
                    $gender = 'Female';
                    break;
            }
        }

        //split fname and lname
        if($name){
            
            $name = explode(" ", $name);
            $fname = $name[0];
            $lname  = $name[1];
        }
    }
}


if(isset($_POST['submit-changes'])){
    $id = $_GET['id'];

    $name = "\"".Input::get("fname")." ".Input::get("lname")."\"";
    $tel = "\"".Input::get("tel")."\"";
    $email = "\"".Input::get("email")."\"";
    $bio = "\"".Input::get("bio")."\"";
     
    $where_email = Input::get("email");

    $fields = array('name' => $name,
    				'email' => $email,
                    'bio' => $bio,
                    'tel' => $tel);

   
    if($db->update('users', $where_email, $fields)){
        //To be Implemented on Ajax
        header('location: editprofile.php?id='.$id);
    }

}

?>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>SwahiliPotHub | Edit</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/custom.css">


</head>
<nav class="navbar navbar-default"></nav>
<div class="container target">
    <div class="row">
    <form action="" method="POST">
        <div class="col-sm-3">
        <!--left col-->
            <ul class="list-group panel-default">
                <li class="list-group-item text-muted panel-heading" contenteditable="false">Profile</li>

                <li class="list-group-item "><strong class="">Reg. NO:</strong><span class="pull-right"><?php echo $regno; ?></span> </li>

                <li class="list-group-item "><strong class="">Sex:</strong><span class="pull-right"><?php echo $gender; ?></span> </li>

                <li class="list-group-item "><strong class="">Joined:</strong> <span class="pull-right"><?php echo $created; ?></span> </li>

                <li class="list-group-item "><strong class="">Status:</strong><span class="pull-right"> <?php echo $st; ?></span> </li>
                
            </ul>

            <div class="panel panel-default">
                <div class="panel-heading">Community</div>
                <div class="panel-body">
                    <label class="pull-left">Current Bounties:</label>

                    <span type="number" name="bounties" class="pull-right" ><?php echo $bounties; ?> </span>
                    <!-- Input to Increase the bonga points -->
                </div>
            </div>

          
            <div class="panel panel-default">
                <div class="panel-heading">Social Media</div>
                <div class="panel-body">
                </div>
            </div>
        </div>
        <!--/col-3-->
        <div class="col-sm-9" contenteditable="false" style="">
            <div class="panel panel-default">
                <div class="panel-heading">User Details</div>
                <div class="panel-body"> 
                    <div class="row">
                        <div class="col-md-6">
                            <label>First Name </label>
                            <input class="form-control" type="text" name="fname"  required value=<?php echo $fname; ?>>

                            <label>Email Address </label>
                            <input class="form-control" type="email" name="email" required value=<?php echo $email; ?>>
                        </div>
                        <div class="col-md-6">
                            <label>Last Name </label>
                            <input class="form-control" type="text" name="lname" required value=<?php echo $lname; ?> >
                            
                            <label>Phone Number</label>
                            <input class="form-control" type="tel" name="tel" required value=<?php echo $tel; ?>>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default target">
                <div class="panel-heading" contenteditable="false">Bio</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <textarea class="form-control" name="bio" style="height:150px;" ><?php echo $bio; ?></textarea>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="pull-right">
                        <button type="reset" class="btn btn-danger">Cancel</button>
                        <button type="submit" name="submit-changes" class="btn btn-primary">Save Details</button> 
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
</div>

<footer id="footer">

</footer>
  
</div>
