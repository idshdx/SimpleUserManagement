<html lang="en">
<head>
    <meta charset="utf-8">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
</head>
 
<body>
<br><br>
<div class="container" style="padding-top: 60px;">
  <h1 class="page-header">Edit Profile</h1>
  <div class="row">
    <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
      <h3>Personal info of <strong><?php echo $result['username'] ; ?></strong></h3>
      <form class="form-horizontal" role="form"  action="<?php echo site_url('edit')?>" method="POST" name="myform">
        <div class="form-group">
          <label class="col-lg-3 control-label">Name:</label>
          <div class="col-lg-8">
            <input class="form-control" name="name" type="text" placeholder="<?php echo $result['name'] ; ?>">
            <span class="text-danger"><?php echo form_error('name'); ?></span>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Email:</label>
          <div class="col-lg-8">
            <input class="form-control" name="email" type="text" placeholder="<?php echo $result['email'] ; ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Phone Number:</label>
          <div class="col-lg-8">
            <input class="form-control" name="phone_number" type="text" placeholder="<?php echo $result['phone_number'] ; ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Description:</label>
          <div class="col-lg-8">
            <input class="form-control" name="description" type="text" placeholder="<?php echo $result['description'] ; ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Age Category:</label>
          <div class="col-lg-8">
            <div class="ui-select">
              <select id="user_age_category" name="user_age_category" class="form-control">
                <option id="teenager"value="1">Teenager</option>
                <option id="adult" value="2">Adult</option>
                <option id="elder" value="3">Elder</option>
              </select>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label">Password:</label>
          <div class="col-md-8">
            <input class="form-control" name="password1" id="password1"  type="password" placeholder="Your password is required">
            <span class="text-danger"><?php echo form_error('password1'); ?></span>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label">Confirm password:</label>
          <div class="col-md-8">
            <input class="form-control" name="password2" id="password2"  type="password" placeholder="Second password must match the first one">
            <span class="text-danger"><?php echo form_error('password2'); ?></span>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label"></label>
          <div class="col-md-8">
            <input class="btn btn-default" value="Go back to login screen" formaction="<?php echo site_url('main')?>" type="submit">       
            <span></span>
            <input class="btn btn-primary" name="btn_update" id="btn_update" value="Update" type="submit">
            <span></span>
            <input class="btn btn-danger" name="btn_password" id="btn_password" formaction="<?php echo site_url('edit/change_pass')?>" value="Change password" type="submit">
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
<script>
 $(document).ready(function(){
      $('#btn_update').attr('disabled', true);
      $('#password1').keyup(function(){
        if(($('#password1').val().length != 0) && ($('#password2').val().length != 0))
          $('#btn_update').attr('disabled', false);
        else
          $('#btn_update').attr('disabled', true);        
      });
      $('#password2').keyup(function(){
        if(($('#password1').val().length != 0) && ($('#password2').val().length != 0))
          $('#btn_update').attr('disabled', false);
        else
          $('#btn_update').attr('disabled', true);        
      });
    });
</script>
</body>
</html>