<?php
  error_reporting( ~E_NOTICE );
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
    <div class="col-sm-12 col-md-10 col-md-offset-1">
      <div class="row">

      <div class="col-sm-1 col-md-1">
      <!-- empty div tag/column -->
      </div>

      <form method="post" action="image_upload_script.php" enctype="multipart/form-data">

        <?php
        if(isset($errMSG)){
          ?>
              <div class="alert alert-danger">
                <span class="glyphicon glyphicon-info-sign"></span> &nbsp; <?php echo $errMSG; ?>
              </div>
              <?php
        }
        ?>

        <div class="col-sm-3 col-md-3">
          <div class="sph-well text-center">
            <!-- <img class="" alt="profile picture"> -->

            <input type="hidden" class="form-control" id="email" name="email" placeholder="Enter full name" value="<?php echo $userRow['email']; ?>"  >

            <img  class="img-responsive center-block img-rounded loading_bg" src="<?php echo $userRow['profile_pic']; ?>" />
            
          </div>
          <input class="input-group" type="file" name="uploaded_file" accept="image/*" / >

          <button type="submit" class="">Update picture</button>
        </div>
       </form>
        
        <div class="col-sm-7 col-md-7" style="padding-bottom: 5em;">
          <div class="sph-well">
            <h3 class="margin_0">User information</h3>
            <hr>

            <address>
              <b>Full name:&nbsp</b>
              <?php echo $userRow['name']; ?>
            </address><hr>

            <address>
              <b>Email:&nbsp</b>
              <?php echo $userRow['email']; ?>
            </address><hr>

            <address>
              <b>Gender:&nbsp</b>
              <?php echo $userRow['gender']; ?>
            </address><hr>

            <address>
              <b>Cartegory:&nbsp</b>
              <?php echo $userRow['cartegory']; ?>
            </address><hr>
            
            <address>
              <b>Address:&nbsp</b>
              <?php echo $userRow['address']; ?>
            </address><hr>

            <address>
              <b>Phone:&nbsp</b>
              <?php echo $userRow['tel']; ?>
            </address><hr>

            <address>
              <b>Bio:&nbsp</b>
              <?php echo $userRow['bio']; ?>
            </address><hr>

            <address>
              <b>Website:&nbsp</b>
              <?php echo $userRow['website']; ?>
            </address><hr>

            <address>
              <b>Status:&nbsp</b>
              <span class="text-success"><?php echo $userRow['status']; ?></span>         
            </address>

            <!-- <address class="margin_0">
              <b>Role</b>
              <br>
              User
            </address> -->
            
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