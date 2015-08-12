<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Login Form</title>
     <!--link the bootstrap css file-->
     <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
     
     <style type="text/css">
     .colbox {
          margin-left: 0px;
          margin-right: 0px;
     }
     </style>
</head>
<body>


<div class="container" style="padding-top: 60px;">
  <h1 class="page-header">Edit Profile</h1>
  <div class="row">
    <!-- edit form column -->
    <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
      <div class="alert alert-info alert-dismissable">
        <a class="panel-close close" data-dismiss="alert">×</a> 
        <i class="fa fa-coffee"></i>
        <?php echo form_error('username'); ?>
      </div>
      <h3>Personal info</h3>
      <form class="form-horizontal" role="form" action="edit_profile" method="POST">
        <div class="form-group">
          <label class="col-lg-3 control-label">Name:</label>
          <div class="col-lg-8">
            <input class="form-control" id="name" value="Popescu Ion" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Phone Number:</label>
          <div class="col-lg-8">
            <input class="form-control" value="555-555-5555" type="alphanumeric">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Description:</label>
          <div class="col-lg-8">
            <input class="form-control" value="I am funny" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Email:</label>
          <div class="col-lg-8">
            <input class="form-control" value="example@example.com" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Age category:</label>
          <div class="col-lg-8">
            <div class="ui-select">
              <select id="user_age_category" class="form-control">
               <option value="child">Child</option>
                <option value="teenager">Teenager</option>
                <option value="young-adult">Young Adult</option>
                <option value="adult" selected="selected">Adult</option>
                <option value="elder">Elder</option>
              </select>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label">Username:</label>
          <div class="col-md-8">
            <input class="form-control" value="Your username" id="username" type="text"> 
            <span><?php echo form_error('username'); ?></span>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label">Password:</label>
          <div class="col-md-8">
            <input class="form-control" value="11111122333" id="password1" type="password">
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label">Confirm password:</label>
          <div class="col-md-8">
            <input class="form-control" value="11111122333" id="password2" type="password">
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label"></label>
          <div class="col-md-8">
            <input class="btn btn-primary" value="Save Changes" type="submit">
            <span></span>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
     
<!--load jQuery library-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!--load bootstrap.js-->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>