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
    <script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
    <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
    <?php
   
   
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