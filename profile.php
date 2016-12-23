<!DOCTYPE html>
<html>
<head>
  <title> Profile Page | Swahilipot Hub</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <style type="text/css">
    /* CSS used here will be applied after bootstrap.css */
    body {
      background-color: #eaeaea;
    }

    img.avatar {
      border: 1px solid #eee;
    }

    .only-bottom-margin {
      margin-top: 0px;
    }

    .activity-mini {
      padding-right: 15px;
      float: left;
    }
  </style>
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-md-9">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="row">
            <div class="col-md-6 lead">User profile</div> 
            <div class="col-md-6">
              <hr><button class="btn btn-default pull-right"><i class="glyphicon glyphicon-user"></i> Logout</button>
            </div>
          </div>
          <div class="row">
      <div class="col-md-4 text-center">
              <img class="img-circle avatar avatar-original" style="-webkit-user-select:none; 
              display:block; margin:auto;" src="http://robohash.org/sitsequiquia.png?size=120x120">
            </div>
            <div class="col-md-8">
              <div class="row">
                <div class="col-md-12">
                  <h1 class="only-bottom-margin">User Name</h1>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <span class="text-muted">Email:</span> email@test.com<br>
                  <span class="text-muted">Birth date:</span> 01.01.2001<br>
                  <span class="text-muted">Gender:</span> male<br><br>
                  <small class="text-muted">Created: 01.01.2015</small>
                </div>
                <div class="col-md-6">
                  <div class="activity-mini">
                    <i class="glyphicon glyphicon-comment text-muted"></i> 500
                  </div>
                  <div class="activity-mini">
                    <i class="glyphicon glyphicon-thumbs-up text-muted"></i> 1500
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <span class="text-muted">Email:</span> email@test.com<br>
                  <span class="text-muted">Birth date:</span> 01.01.2001<br>
                  <span class="text-muted">Gender:</span> male<br><br>
                  <small class="text-muted">Created: 01.01.2015</small>
                </div>
                <div class="col-md-6">
                  <div class="activity-mini">
                    <i class="glyphicon glyphicon-comment text-muted"></i> 500
                  </div>
                  <div class="activity-mini">
                    <i class="glyphicon glyphicon-thumbs-up text-muted"></i> 1500
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <hr><button class="btn btn-default pull-right"><i class="glyphicon glyphicon-pencil"></i> Edit</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>