<html>
   
   <head>
      <title>Update a Record in MySQL Database</title>
   </head>
   
   <body>
      <?php
         if(isset($_POST['update'])) {
            $dbhost = 'localhost:3036';
            $dbuser = 'root';
            $dbpass = 'root';
            
            $conn = mysql_connect($dbhost, $dbuser, $dbpass);
            
            if(! $conn ) {
               die('Could not connect: ' . mysql_error());
            }
            
            $username = $_POST['username'];
            $bio = $_POST['bio'];
            
            $sql = "UPDATE users ". "SET user_bio = $bio ". 
               "WHERE user_name = $username" ;
            mysql_select_db('dblogin');
            $retval = mysql_query( $sql, $conn );
            
            if(! $retval ) {
               die('Could not update data: ' . mysql_error());
            }
            echo "Updated data successfully\n";
            
            mysql_close($conn);
         }else {
            ?>
               <form method = "post" action = "<?php $_PHP_SELF ?>">
                  <table width = "400" border =" 0" cellspacing = "1" 
                     cellpadding = "2">
                  
                     <tr>
                        <td width = "100">Employee ID</td>
                        <td><input name = "username" type = "text" 
                           id = "username"></td>
                     </tr>
                  
                     <tr>
                        <td width = "100">Employee Salary</td>
                        <td><input name = "bio" type = "text" 
                           id = "bio"></td>
                     </tr>
                  
                     <tr>
                        <td width = "100"> </td>
                        <td> </td>
                     </tr>
                  
                     <tr>
                        <td width = "100"> </td>
                        <td>
                           <input name = "update" type = "submit" 
                              id = "update" value = "Update">
                        </td>
                     </tr>
                  
                  </table>
               </form>
            <?php
         }
      ?>
      
   </body>
</html>

