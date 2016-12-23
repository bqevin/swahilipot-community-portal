<?php
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);

   
   
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   
   $sql = 'SELECT * FROM users';
   mysql_select_db('swahilipot');
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
   
   while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) 
   		{
   			?>
            <style>

               .popover { background: #337ab7; color:; }

            </style>
   	        <div class="col-md-2 col-xs-6">
   	        <a class="" href="" title=" Name:<?php echo $row['name']; ?>" data-toggle="popover" data-trigger="hover" data-container="body" data-placement="bottom" data-content=" Profession:  <?php echo $row['cartegory']; ?>  Mobile:  <?php echo $row['tel']; ?> Email:  <?php echo $row['email']; ?> Address: <?php echo $row['address']; ?> Bio: <?php echo $row['bio']; ?> Website: <?php echo $row['website']; ?>  "  >
               <!-- <p class="page-header" align="center"><?php echo $row['name']; ?></p> -->
      			<img src=" <?php echo $row['profile_pic']; ?> " class="img-circle" width="150px" height="150px" />
      			</a>
               <hr>
			</div> 
			
			<?php
   }
   
   mysql_close($conn);
?>

<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});
</script>