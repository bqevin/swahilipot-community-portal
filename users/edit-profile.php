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
	<div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="row">
        
        <div class="col-sm-1 col-md-1">
      <!-- empty div tag/column -->
      </div>
        
        <div class="col-sm-3">
          <div class="panel panel-default">
            <div class="panel-heading"><b><i class="fa fa-cog" aria-hidden="true"></i> User settings</b></div>
            <div class="list-group list_group_custom">
              <a href="edit-profile.php" class="list-group-item active">Profile</a>
              <a href="reset-password.php" class="list-group-item ">Account</a>
              <!-- <a href=" " class="list-group-item ">Localization</a> -->
            </div>
          </div>
        </div>
       

        <div class="col-sm-7" style="padding-bottom: 5em;">
          <div class="sph-well clearfix">
            <h3 class="margin_0">User profile settings</h3>
            <hr>
            <div class="panel panel-default">

            <form method="post" action="snippets/update.php"  enctype="multipart/form-data>

                <div class="panel-body">
                  <div class="row">
                    <div class="col-sm-5 text-center">
                      <img class="img-responsive center-block img-rounded loading_bg" src="<?php echo $userRow['profile_pic']; ?>" alt="profile picture" >
                    </div>
                    <div class="col-sm-7">
                      <hr class="visible-xs margin_tb_gutter">
                      <!-- <input name="Choose_file" type="file"/> -->
                      <!-- <input name="upload_pic"  type="submit" value="Upload It" /> -->
                      
                    </div>
                  </div>
                </div>
             
            </div>     


              <div class="panel panel-default">
                  
                <div class="panel-body">
                    <p class="help-block">Fields marked with <code>*</code> are required.</p>
                  <div class="form-group">
                    <label for="name">Full name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter full name" value="<?php echo $userRow['name']; ?>">
                  </div>
         
                  <div class="form-group">
                    <label for="email">Email <code>*</code></label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="<?php echo $userRow['email']; ?>" required >
                  </div>

                  <div class="form-group">
                    <label for="gender">Gender</label>
                    <input type="gender" class="form-control" id="gender" name="gender" placeholder="Enter your Sex" value="<?php echo $userRow['gender']; ?>" >
                  </div>

                  <div class="form-group">
                    <label for="cartegory">Cartegory</label>
                    <input type="cartegory" class="form-control" id="cartegory" name="cartegory" placeholder="Choose Cartegory" value="<?php echo $userRow['cartegory']; ?>"  >
                  </div>

                  <div class="form-group">
                    <label for="name">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter your address" value="<?php echo $userRow['address']; ?>">
                  </div>

                  <div class="form-group">
                    <label for="tel">Phone</label>
                    <input type="text" class="form-control" id="tel" name="tel" placeholder="Enter phone" value="<?php echo $userRow['tel']; ?>">
                  </div>    

                  <div class="form-group margin_0">
                    <label for="bio">Bio</label>
                    <textarea class="form-control" rows="4" id="bio" name="bio" placeholder="Enter your bio" auto-size style="max-height: 250px;"><?php echo $userRow['bio']; ?></textarea>
                  </div>

                  <div class="form-group">
                    <label for="website">Website</label>
                    <input type="text" class="form-control" id="website" name="website" placeholder="Enter your website link" value="<?php echo $userRow['website']; ?>">
                  </div>

                  </div>
              </div>
              <input type="hidden" name="csrf_token" value="02291d19b6781a2a6c9982f0ec2b9f5c">
              <button type="submit" class="btn btn-primary pull-right" name="update">Update profile</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<?php include 'snippets/footer.php' ?> 

<script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>