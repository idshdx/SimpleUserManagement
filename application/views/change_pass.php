<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Login Form</title>
     <!--link the bootstrap css file-->
     <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
     <script type="text/javascript" src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
     
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
  <h1 class="page-header">Change password</h1>
  <div id="flash" class="text-success" style="display:none;">Data Saved Successfully</div>
  </div>
  <div class="row">
          <?php 
          $attributes = array("class" => "form-horizontal", "id" => "form", "name" => "form");
          echo form_open("", $attributes);?>
              
              <div class="form-group">
                <label class="col-lg-3 control-label">Old Password:</label>
                <div class="col-lg-4">
                  <input class="form-control" id="input_oldpassword" name="input_oldpassword" placeholder="Old password" type="password" value="<?php echo set_value('input_oldpassword'); ?>" />
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
                    <input id="btn_cancel" name="action" formaction="<?php echo site_url('main')?>" type="button" class="btn btn-default" value="Back" />     
                    <span></span>
                    <input id="btn_update" name="action" type="button" class="btn btn-primary" value="Update password" />
                </div>
              </div>

          <?php echo form_close(); ?>
          </div>
     </div>
</div>
     
<!--load Assets-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="<?php echo base_url('assets/jquery/jquery.validate.js')?>"></script>
<script>

$('#form').validate({
        rules: {
          input_oldpassword: {
            minlength: 4,
            maxlength: 20,
          },
          input_newpassword1: {
            minlength: 4,
            maxlength: 20,
          },
          input_newpassword2: {
            minlength: 4,
            maxlength: 20,
            equalTo: "#input_newpassword1",
          }
          
        }
      });

 $("#btn_update").click(function(){ 
        

       // ajax call
          $.ajax({
            url : "<?php echo site_url('edit/new_password')?>",
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {    
              $("#form").append(data);
              $('#flash').css("display","block");;
              setTimeout(function () {
              $('#flash').slideUp();`enter code here`}, 2000);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });//end of ajax call
    }); 
    
      $("#btn_cancel").click(function(){ 
       window.location.href='<?php echo site_url('main')?>';
    }); 

 $(document).ready(function(){
      $('#btn_update').attr('disabled', true);
      $('#input_newpassword1').keyup(function(){
        if(($('#input_newpassword1').val().length != 0) && ($('#input_newpassword2').val().length != 0))
          $('#btn_update').attr('disabled', false);
        else
          $('#btn_update').attr('disabled', true);        
      });
      $('#input_newpassword2').keyup(function(){
        if(($('#input_newpassword1').val().length != 0) && ($('#input_newpassword2').val().length != 0))
          $('#btn_update').attr('disabled', false);
        else
          $('#btn_update').attr('disabled', true);        
      });
    });
</script>
</body>
</html>