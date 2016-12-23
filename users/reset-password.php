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
            <a href="edit-profile.php" class="list-group-item ">Profile</a>
            <a href="reset-password.php" class="list-group-item active">Account</a>
            <!-- <a href=" " class="list-group-item ">Localization</a> -->
          </div>
        </div>
      </div>

      <div class="col-sm-7" style="padding-bottom: 5em;" >
        <div class="sph-well clearfix">
          <h3 class="margin_0">User account settings</h3>
          <hr>

   <!-- Form begins here -->
            <form method="post" action="snippets/update-pass.php">
              <div class="panel panel-default">
                  <div class="panel-heading">
                    <h3 class="panel-title">Change or reset password</h3>
                  </div>
                  <div class="panel-body">
                    <p>Change your password or reset your current password.</p>
                    <p class="help-block">All fields are required.</p>
                    
                  <div class="form-group">
                    <label for="oldpass">Current password</label>
                    <div input-group="hidden">
                      <input type="password" class="form-control" id="oldpass" name="oldpass" placeholder="Enter current password" value="" required>
                      <span class="input-group-btn hidden">
                            <button button-type="visibility-toggle" class="btn btn-default" type="button"><i class="fa fa-eye" aria-hidden="true"></i></button>
                          </span>
                        </div>
                    <p class="help-block"><a href="http://blueshield.scriptseries.com/user/reset/">Forgot your password?</a></p>
                  </div>

                  <div class="form-group" focus-show-help-block>
                    <label for="newpass">New password</label>
                    <div input-group="hidden">
                      <input type="password" class="form-control" id="new_password" name="newpass" placeholder="Enter new password" value="" required>
                      <span class="input-group-btn hidden">
                            <button button-type="visibility-toggle" class="btn btn-default" type="button"><i class="fa fa-eye" aria-hidden="true"></i></button>
                          </span>
                        </div>
                    <small class="hidden" focus-show-help-block>
                      <p class="help-block"><span class="label label-default">Note</span> New password must be contain at least 8 characters, including at least 1 number and includes both lower and uppercase letters and special characters e.i: # ,@ ,? ,! and etc...</p>
                    </small>
                  </div>

                  <div class="form-group margin_0">
                    <label for="confirm_new_password">Confirm new password</label>
                    <div input-group="hidden">
                      <input type="password" class="form-control" id="confirm_new_password" name="confirm_new_password" placeholder="Enter new password one more time" required>
                      <span class="input-group-btn hidden">
                            <button button-type="visibility-toggle" class="btn btn-default" type="button"><i class="fa fa-eye" aria-hidden="true"></i></button>
                          </span>
                        </div>
                  </div>
                  </div>
              </div>
              <input type="hidden" name="csrf_token" value="02291d19b6781a2a6c9982f0ec2b9f5c">
              <button type="submit" class="btn btn-primary pull-right" name="update_pass">Change password</button>
            </form>
          </div>
        </div>

        <div class="col-sm-1 col-md-1">
      <!-- empty div tag/column -->
      </div>

      </div>
    </div>
  </div>

</div>
<?php include 'snippets/footer.php' ?> 
<script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>