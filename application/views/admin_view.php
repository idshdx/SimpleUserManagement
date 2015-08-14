<html lang="en">
<head>
    <meta charset="utf-8">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
</head>
 
<body>
<div class="container">
    <div class="row">
    <h3>Viewing all users as an admin</h3>
    </div>
    <div class="row">
    <p><button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#myModal3">Add New User</button></p>
    <table class="table table-striped table-bordered table-hover">
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
    <?php
   
   
    foreach ($users as $user) {
        echo '<tr>';
        echo '<td>'. $user->username . '</td>';
        echo '<td>'. $user->name . '</td>';
        echo '<td>'. $user->email . '</td>';
        echo '<td>'. $user->phone_number . '</td>';
        echo '<td>'. $user->description . '</td>';
        echo '<td>'. $user->type . '</td>';
        echo '<td>'. $user->age_category . '</td>';
        echo '<td>';
        echo '<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>';  
        echo  '<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal2"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>';
        echo '</td>';
        echo '</tr>';
    }
$users = null;
    ?>
    </tbody>
    </table>
    </div><!-- /row -->
        <!-- Modal 3 -->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add New User</h4>
      </div>
      <div class="modal-body">
        Account Details
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

    <!-- Modal 1 -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Account</h4>
      </div>
      <div class="modal-body">
        <h3>Personal info</h3>
      <form class="form-horizontal" role="form" action="edit" method="POST" name="myform">
        <div class="form-group">
          <label class="col-lg-3 control-label">Name:</label>
          <div class="col-lg-8">
            <input class="form-control" name="name" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Email:</label>
          <div class="col-lg-8">
            <input class="form-control" name="email" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Phone Number:</label>
          <div class="col-lg-8">
            <input class="form-control" name="phone_number" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Description:</label>
          <div class="col-lg-8">
            <input class="form-control" name="description" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Age Category:</label>
          <div class="col-lg-8">
            <div class="ui-select">
              <select id="user_age_category" class="form-control">
                <option value="teenager">Teenager</option>
                <option value="young-adult">Young Adult</option>
                <option value="adult" selected="selected">Adult</option>
                <option value="elder">Elder</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

 <!-- Modal 2 -->
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
        <button type="button" class="btn btn-danger">Delete</button>
      </div>
    </div>
  </div>
</div>

</div><!-- /container -->
<script src="https://code.jquery.com/jquery-2.1.4.js" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" ></script>
</body>
</html>