<html lang="en">
<head>
    <meta charset="utf-8">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/javascript" href="http://www.appelsiini.net/download/jquery.jeditable.js">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
</head>
 
<body>
<br><br>
<div class="container" style="padding-top: 60px;">
  <h1 class="page-header">Edit Profile</h1>
  <div class="row">
    <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
      <h3>Personal info of <strong><?php echo $result['username'] ; ?></strong></h3>

      <div id="flash" class="text-success" style="display:none;">Data Saved Successfully</div>

      <form class="form-horizontal" name="form" id="form">
        <div class="form-group">
          <label class="col-lg-3 control-label">Name:</label>
          <div class="col-lg-8">
            <input class="form-control" name="name" type="text" value="<?php echo $result['name'] ; ?>">
            <span class="text-danger"><?php echo form_error('name'); ?></span>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Email:</label>
          <div class="col-lg-8">
            <input class="form-control" name="email" id="email" type="text" value="<?php echo $result['email'] ; ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Phone Number:</label>
          <div class="col-lg-8">
            <input class="form-control" name="phone_number" id="phone_number" type="text" value="<?php echo $result['phone_number'] ; ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Description:</label>
          <div class="col-lg-8">
            <input class="form-control" name="description" id="description" type="text" value="<?php echo $result['description'] ; ?>">
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
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label">Confirm password:</label>
          <div class="col-md-8">
            <input class="form-control" name="password2" id="password2"  type="password" placeholder="Second password must match the first one">
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label"></label>
          <div class="col-md-8">
            <input class="btn btn-default" id="btn_back" value="Back" type="reset">       
            <span></span>
            <input class="btn btn-primary" name="action" id="btn_update" value="Update" type="button">
            <span></span>
            <input class="btn btn-danger" name="action" id="btn_password" value="Change password" type="button">
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
<script src="<?php echo base_url('assets/jquery/jquery.validate.js')?>"></script>
<script type="text/javascript" src="http://www.appelsiini.net/download/jquery.jeditable.js"></script>
<script>

//Set the validations 

      $('#form').validate({
        rules: {
          name: {
            minlength: 4,
            maxlength: 20,
          },

          email: {
            email: true,
            minlength: 8,
            maxlength: 40,
          },

          phone_number: {
            number: true,
            minlength: 10,
            maxlength: 10,
          },

          description: {
            minlength: 6,
            maxlength: 40,
          }
        }
      });




      $("#btn_update").click(function() { 
       // ajax call
          $.ajax({
            url : "<?php echo site_url('edit/edit')?>",
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               // show succes msg and change the fields
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
    
      $("#btn_password").click(function(){ 
       window.location.href='<?php echo site_url('edit/change_pass')?>';
    }); 

       $("#btn_back").click(function(){ 
       window.location.href='<?php echo site_url('main')?>';
    }); 

    


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