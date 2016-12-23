<?php
// Turn off all error reporting
// /error_reporting(0);
//including the database connection file
include_once("config.php");
//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM updates ORDER BY id DESC"); // using mysqli_query instead
?>  

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Kevin Barassa">

    <title>Swahilipot Updates </title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- SWAL CSS -->
    <link href="../css/swal.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<style type="text/css">
    .profile-card {
    background-color: #222222;
  margin-bottom: 20px;
            
        }
        
.profile-pic {
  border-radius: 50%;
  position: absolute;
  top: -65px;
  left: 0;
  right: 0;
  margin: auto;
  z-index: 1;
  max-width: 100px;
  -webkit-transition: all 0.4s;
          transition: all 0.4s;
                }

                
.profile-info {
        color: #BDBDBD;
        padding: 25px;
        position: relative;
        margin-top: 15px;
                }
        
.profile-info h2 {
    color: #E8E8E8;
    letter-spacing: 4px;
      padding-bottom: 12px;
                }
                
.profile-info span {
    display: block;
    font-size: 12px;
    color: #e18728;
    letter-spacing: 2px;
            }

.profile-info a {
     color: #e18728;
        }
.profile-info i {
        padding: 15px 35px 0px 35px;
        }
        

.profile-card:hover .profile-pic {
    
    transform: scale(1.1);
        }

.profile-card:hover .profile-info hr  {
    opacity: 1;
        }
        
        
        
        
/* Underline From Center */
.hvr-underline-from-center {
  display: inline-block;
  vertical-align: middle;
  -webkit-transform: translateZ(0);
  transform: translateZ(0);
  box-shadow: 0 0 1px rgba(0, 0, 0, 0);
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
  -moz-osx-font-smoothing: grayscale;
  position: relative;
  overflow: hidden;
}
.hvr-underline-from-center:before {
  content: "";
  position: absolute;
  z-index: -1;
  left: 52%;
  right: 52%;
  bottom: 0;
  background: #FFFFFF;
  border-radius: 50%;
  height: 3px;
  -webkit-transition-property: all;
  transition-property: all;
  -webkit-transition-duration: 0.2s;
  transition-duration: 0.2s;
  -webkit-transition-timing-function: ease-out;
  transition-timing-function: ease-out;
}
.profile-card:hover .hvr-underline-from-center:before, .profile-card:focus .hvr-underline-from-center:before, .profile-card:active .hvr-underline-from-center:before {
  left: 0;
  right: 0;
  height: 1px;
  background: #CECECE;
}

</style>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Swahilipot Updates</a>
            </div>
            <!-- /.navbar-header -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href=""><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header pull-left">Swahilipot Hub | Updates Dashboard</h1> <a style="margin-top: 10px;" data-toggle="modal" data-target="#updateModal" class="pull-right btn btn-lg btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> New Update </a>
                </div>
                <!-- /.col-lg-12 -->
                <!-- Modal -->
                <div id="updateModal"  class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Status Update</h4>
                      </div>
                      <div class="modal-body">
                      <form action="add.php" method="post" name="form1">
                        <div class="form-group">
                            <label>Please type the long description here</label>
                            <textarea class="form-control" rows="5" name="status"></textarea>
                        </div>
                        <input class="form-control" placeholder="Poster Link" name="image"> <br>
                        <input class="form-control" placeholder="Link to more info" name="url"> <br>
                        <br><br>
                        <input class="btn btn-primary" type="submit" name="Submit" value="Post Update">
                        </form>
                        
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>

                  </div>
                  <?php
                    //Handle on update created successfully
                    if (isset($_GET['message'])) {
                        echo "<script type='text/JavaScript'>
                        swal('Success!', 'You created an update!', 'success');
                        </script>";
                    }
                  ?>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <?php 
                //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
                while($res = mysqli_fetch_array($result)) {         
                    echo '<div class="col-md-4">
                              <div class="profile-card text-center">
                                <div style="max-height:200px; overflow:hidden;">
                                <img class="img-responsive" src="'.$res['image'].'">
                                </div>
                                <div class="profile-info">
                                  <img class="profile-pic" src="'.$res['profilePic'].'">
                                  <h2 class="hvr-underline-from-center"><span></span></h2>
                                  <div style="height:90px; overflow: hidden;">'.$res['status'].'</div>
                                  <a href="edit.php?id='.$res['id'].'"><i class="fa fa-pencil fa-2x"></i></a>
                                  <a href=""><i class="fa fa-user fa-2x"></i></a>
                                  <a href="delete.php?id='.$res['id'].'" onClick="return confirm("Are you sure you want to delete?")"><i class="fa fa-trash-o fa-2x"></i></a>
                                </div>

                              </div>
                            </div>';    
                }
                ?>        
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>
    <!-- SwalJavaScript -->
    <script src="../js/swal.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
