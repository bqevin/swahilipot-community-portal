<?php

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
    $email = Input::get("email");
    $bio = "\"".Input::get("bio")."\"";
    $bounties = "\"".Input::get("bounties")."\"";

    if(Input::get("deactivate") === "on" ){

        $status = 2;
    }
    elseif (Input::get("activate") === "on" ) {

        $status = 1;
    }
    
    $fields = array('name' => $name, 
                    'bio' => $bio,
                    'bounties' => $bounties);

    if(!empty($status)){
        $fields['status']= $status;
    }
    
    if($db->update('users', $email, $fields)){
        //To be Implemented on Ajax
        header('location: edituser.php?id='.$id);
    }

}

?>
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

                <?php

                if($status == 1){
                    echo '<li class="list-group-item "><strong class="">Deactivate Account</strong></span><input class="pull-right" type="checkbox" name="deactivate"></li>';
                }
                else{
                    echo '<li class="list-group-item "><strong class="">Activate Account</strong></span><input class="pull-right" type="checkbox" name="activate"></li>';
                }

                ?>
                
            </ul>

            <div class="panel panel-default">
                <div class="panel-heading">Community</div>
                <div class="panel-body">
                    <label class="pull-left">Current Bounties:</label>

                    <input type="number" name="bounties" class="pull-right form-control" 
                    min=<?php echo "\"".$bounties."\""; ?> 
                    value=<?php echo "\"".$bounties."\""; ?> >
                    <!-- Input to Increase the bonga points -->
                </div>
            </div>

            <ul class="list-group panel-default">
                <li class="list-group-item text-muted panel-heading">Contacts<i class="fa fa-dashboard fa-1x"></i></li>

                <li class="list-group-item text-left"><strong class="">Tel:</strong><span class="pull-left"></span> <?php echo $tel; ?></span></li>

                <li class="list-group-item text-left"><strong class="">Address</strong<span class="pull-left"></span> <?php echo $address; ?></span></li>
            </ul>


            <div class="panel panel-default">
                <div class="panel-heading">Website<i class="fa fa-link fa-1x"></i></div>
                <div class="panel-body">
                    <a href="http://bootply.com" class=""><?php echo $website; ?></a>
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
                            
                            <label>Modify Category </label>
                            <select class="form-control" name="category" required>
                                <option class="" value="">........</option>
                                <option class="" value="techie" <?php if($category == "techie"){ echo "selected"; } ?> >Techie</option>
                                <option class="" value="art" <?php if($category == "art"){ echo "selected"; } ?> >Art</option>
                                <option class="" value="both" <?php if($category == "both"){ echo "selected"; } ?> >Both</option>
                            </select> 
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
