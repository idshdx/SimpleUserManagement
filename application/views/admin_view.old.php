<html lang="en">
<head>
    <meta charset="utf-8">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.8/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.8/js/jquery.dataTables.min.js">
</head>
 
<body>
<div class="container">
    <div class="row">
    <h3>Viewing all users as an admin</h3>
    </div>
    <div class="row">
    <p><button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#myModal3">Add New User</button></p>
    <input type="search" placeholder="Search the database" id="search" name="search">
    <table class="table table-striped table-bordered table-hover" id="admintable" name="admintable">
    <thead>
        <th>Username</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>Description</th>
        <th>Role</th>
        <th>Age Category</th>
        <th>Action</th>
    </thead>
    <tbody>
    <script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
    <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
    <?php
   
    
    /*$this->table->set_heading('Username', 'Name', 'Email', 'Phone Number', 'Description','Role','Age Category','test');
    echo $this->table->generate($users);*/

    

    foreach ($users as $user) {
        echo '<tr>';
        echo '<td data-toggle="tooltip" data-placement="top" title=" '. $user->description .'">'. $user->username . '</td>';
        echo '<td data-toggle="tooltip" data-placement="top" title=" '. $user->description .'">'. $user->name . '</td>';
        echo '<td data-toggle="tooltip" data-placement="top" title=" '. $user->description .'">'. $user->email . '</td>';
        echo '<td data-toggle="tooltip" data-placement="top" title=" '. $user->description .'">'. $user->phone_number . '</td>';
        echo '<td data-toggle="tooltip" data-placement="top" title=" '. $user->description .'">'. $user->description . '</td>';
        echo '<td data-toggle="tooltip" data-placement="top" title=" '. $user->description .'">'. $user->type . '</td>';
        echo '<td data-toggle="tooltip" data-placement="top" title=" '. $user->description .'">'. $user->age_category . '</td>';
        echo '<td data-toggle="tooltip" data-placement="top" title=" '. $user->description .'">';
        echo '<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>';  
        echo  '<button type="button" id="modaldelete"class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal2"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>';
        echo '</td>';
        echo '</tr>';
    }
$users = null;
    ?>
    </tbody>
    </table>
    </div><!-- /row -->
        <!-- Modal 3 add new user-->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add New User</h4>
      </div>
      <div class="modal-body">

        <form class="form-horizontal" method="POST" name="adduserform" id="adduserform">
        
          <div class="form-group">
            <label class="col-lg-3 control-label">Username:</label>
            <div class="col-lg-8">
              <input class="form-control" name="username" id="username" type="text">
              <span class="text-danger"> <?php echo form_error('username'); ?> </span>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Name:</label>
            <div class="col-lg-8">
              <input class="form-control" name="name" id="name" type="text">
              <span class="text-danger"> <?php echo form_error('name'); ?> </span>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" name="email" id="email" type="text">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Phone Number:</label>
            <div class="col-lg-8">
              <input class="form-control" name="phone_number" id="phone_number" type="numeric">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Description:</label>
            <div class="col-lg-8">
              <input class="form-control" name="description" id="description" type="text">
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
              <input class="form-control" name="password1" id="password1"  type="password">
              <span class="text-danger"><?php echo form_error('password1'); ?></span>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Confirm password:</label>
            <div class="col-md-8">
              <input class="form-control" name="password2" id="password2"  type="password">
              <span class="text-danger"><?php echo form_error('password2'); ?></span>
            </div>
          </div>
           <div class="form-group">
            <label class="col-lg-3 control-label">User Type:</label>
            <div class="col-lg-8">
              <div class="ui-select">
                <select id="user_type" name="user_type" class="form-control">
                  <option id="admin"value="1">Admin</option>
                  <option id="user" value="2">User</option>
                </select>
              </div>
            </div>
          </div> 
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" name="button" id="adduser">Save changes</button>
      </div>
    </div>
  </div>
</div>

 <!-- Modal 2  DELETE MODAL-->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Delete Account</h4>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this account?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" id="delete">Delete</button>
      </div>
    </div>
  </div>
</div>

</div><!-- /container -->
<script src="https://code.jquery.com/jquery-2.1.4.js" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" ></script>

<script>
    $(function () {
        $("[rel='tooltip']").tooltip();
    });


  function ajax_success(data) {
     $('#myModal3').modal('close');
  }
  function ajax_failed( jqXHR, textStatus, errorThrown) {
                alert('eroare:' + errorThrown + jqXHR + textStatus);
  }
  function adduser_clicked(){
    $.ajax(
    {
        url : "/test/index.php/main/add_new_user",
        type: "POST",
        data: $("#adduserform").serialize(),
        dataType: "JSON",
        success: ajax_success,
        error: ajax_failed
    }
    );
  }
  function page_loaded() {
    $("#adduser").click(adduser_clicked);
  }
    $(page_loaded);

   $(document).ready(function(){
    $("td").click(function(){
        $(#myModal2).show();
    });
}); 
/*var dataSet = $users;

$(document).ready(function() {

    $('#admintable').DataTable( {
        data: dataSet,
        columns: [
            { title: "Name" },
            { title: "Position" },
            { title: "Office" },
            { title: "Extn." },
            { title: "Start date" },
            { title: "Salary" }
        ]
    } );
} );*/


  
</script>
</body>
</html>