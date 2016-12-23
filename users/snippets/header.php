<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
<script type="text/javascript" src="snippets/jquery-1.11.3-jquery.min.js"></script>
<link rel="stylesheet" href="snippets/style.css" type="text/css"  />
<title><?php print($userRow['email']); ?></title>
</head>

<body>

<nav class="navbar navbar-default navbar-fixed-top "  >
      <div class="container">
        <div class="navbar-header" >
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://www.swahilipothub.co.ke">Swahilipot Hub</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li ><a href="home.php">Members</a></li>
            <li ><a href="feeds.php">Feeds</a></li>
            <li><a href="events.php">Events</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			  <span class="glyphicon glyphicon-user"></span>&nbsp;Hi' <?php echo $userRow['email']; ?>&nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li>
                <a href="profile.php"><span class="glyphicon glyphicon-user"></span>&nbsp;View Profile</a>
                </li>

                <li>
                <a href="edit-profile.php"><span class="glyphicon glyphicon-user"></span>&nbsp;Edit profile</a>
                </li>

                <li>
                <a href="reset-password.php"><span class="glyphicon glyphicon-user"></span>&nbsp;Change Password</a>
                </li>

                <li>
                <a href="logout.php?logout=true"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a>
                </li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>


    <div class="clearfix"></div>