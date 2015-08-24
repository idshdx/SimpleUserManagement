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
  <h1 class="page-header">Retrieve password</h1>
  <div class="row">
          <?php 
          $attributes = array("class" => "form-horizontal", "id" => "retrieve_pass", "name" => "retrieve_pass");
          echo form_open("<?php echo site_url('edit/retrieve')?>", $attributes);?>
              
              <div class="form-group">
                <label class="col-lg-3 control-label">Email:</label>
                <div class="col-lg-4">
                  <input class="form-control" id="email" name="email" type="text"/>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label"></label>
                <div class="col-md-8">
                    <input id="btn_cancel" name="action" formaction="<?php echo site_url('main')?>" type="submit" class="btn btn-default" value="Back" />     
                    <span></span>
                    <input id="btn_login" name="action" formaction="<?php echo site_url('main/retrieve')?>" type="submit" class="btn btn-primary" value="Retrieve password" />
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
$('#retrieve_pass').validate({
        rules: {  
          email: {
            minlength: 8,
            maxlength: 40,
            email: true,
          }      
        }
      });
</script>
</body>
</html>