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
<!-- <div class="container">
     <div class="row">
          <div class="col-lg-6 col-sm-6">
               <h1>Test Project</h1>
          </div>
     </div>
</div> -->
<hr/>
<br><br>

<div class="container" style="padding-top: 60px;">
  <h1 class="page-header">Login</h1>
  <div class="row">
          <?php 
          $attributes = array("class" => "form-horizontal", "id" => "change_pass", "name" => "change_pass_form");
          echo form_open("main/login_check", $attributes);?>
              
              <div class="form-group">
                <label class="col-lg-3 control-label">Old Password:</label>
                <div class="col-lg-4">
                  <input class="form-control" id="input_username" name="input_username" placeholder="Old password" type="password" value="<?php echo set_value('input_oldpassword'); ?>" />
                  <span class="text-danger"><?php echo form_error('input_oldpassword'); ?></span>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-3 control-label">New Password:</label>
                <div class="col-lg-4">
                  <input class="form-control" id="input_newpassword1" name="input_newpassword1" placeholder="New password" type="password" value="<?php echo set_value('input_newpassword1'); ?>" />
                  <span class="text-danger"><?php echo form_error('input_newpassword1'); ?></span>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-3 control-label">Confirm New Password:</label>
                <div class="col-lg-4">
                  <input class="form-control" id="input_newpassword2" name="input_newpassword2" placeholder="Confirm the new password" type="password" value="<?php echo set_value('input_newpassword2'); ?>" />
                  <span class="text-danger"><?php echo form_error('input_newpassword2'); ?></span>
                </div>
              </div>    

              <div class="form-group">
                <label class="col-md-3 control-label"></label>
                <div class="col-md-8">
                    <input id="btn_cancel" name="btn_cancel" formaction="<?php echo site_url('edit_profile')?>" type="submit" class="btn btn-default" value="Go back to your profile" />     
                    <span></span>
                    <input id="btn_login" name="btn_login" formaction="<?php echo site_url('edit/new_password')?>" type="submit" class="btn btn-primary" value="Update password" />
                </div>
              </div>

          <?php echo form_close(); ?>
          </div>
     </div>
</div>
     
<!--load jQuery library-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!--load bootstrap.js-->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script>
 $(document).ready(function(){
      $('#btn_login').attr('disabled', true);
      $('#input_newpassword1').keyup(function(){
        if(($('#input_newpassword1').val().length != 0) && ($('#input_newpassword2').val().length != 0))
          $('#btn_login').attr('disabled', false);
        else
          $('#btn_login').attr('disabled', true);        
      });
      $('#input_newpassword2').keyup(function(){
        if(($('#input_newpassword1').val().length != 0) && ($('#input_newpassword2').val().length != 0))
          $('#btn_login').attr('disabled', false);
        else
          $('#btn_login').attr('disabled', true);        
      });
    });
</script>
</body>
</html>