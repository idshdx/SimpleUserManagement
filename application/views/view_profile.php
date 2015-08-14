<html lang="en">
<head>
    <meta charset="utf-8">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
</head>
 
<body>
<br><br>
<div class="container" style="padding-top: 60px;">
  <h1 class="page-header">View Profile</h1>
  <div class="row">
    <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
      <h3>Personal info</h3>
      <form class="form-horizontal" role="form" action="edit" method="POST" name="myform">
        <div class="form-group">
          <label class="col-lg-3 control-label">Name:</label>
          <div class="col-lg-8">
            <div class="well"><?php echo $result['name'] ;?>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Email:</label>
          <div class="col-lg-8">
            <div class="well"><?php echo $result['email']; ?>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Phone Number:</label>
          <div class="col-lg-8">
            <div class="well"><?php echo $result['phone_number']; ?>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Description:</label>
          <div class="col-lg-8">
            <div class="well"><?php echo $result['description']; ?>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Age Category:</label>
          <div class="col-lg-8">
            <div class="ui-select">
              <div class="well"><?php echo $result['age_category']; ?>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label"></label>
          <div class="col-md-8">
            <input class="btn btn-primary" name="submit" value="update" type="submit">
            <span></span>
            <input class="btn btn-default" value="Cancel" type="reset">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-2.1.4.js" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" ></script>
</body>
</html>