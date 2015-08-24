<!DOCTYPE html>
<html>
  <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin View</title>
    
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/javascript" href="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.js">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/main.css')?>">
    
    <style type="text/css">
    .tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    }
    </style>

  </head> 
<body>

  <div class="container">
    <h1>Viewing all users as an admin</h1>

    <h3>Simple user management</h3>
    <br />
    <button class="btn btn-success" onclick="add_user()"><i class="glyphicon glyphicon-plus"></i> Add a new user</button>
    </br><br>
    <div class="row">
      <div class="col-md-2">
        <input type="text" class="form-control" id="filter" placeholder="Custom Search" />
        <span id="filter-count"></span>
      </div>
    </div>
    <br />  
    <br />

    <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th class="hide_me">User ID</th>
          <th>Username</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone Number</th>
          <th>Description</th>
          <th style="width:125px;">Action</th>
        </tr>
      </thead>
      <tbody>
      </tbody> 
    </table>

  </div>

  <script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
  <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
  <script src="<?php echo base_url('assets/jquery/jquery.validate.js')?>"></script>
  <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
  <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>

  


  <script type="text/javascript">
    
    //Global variables
    var save_method; //for save method string
    var table;

    $(document).ready(function() {
      

      //Script used for the custom search

      $("#filter").keyup(function(){

        var filter = $(this).val(), count = 0; // Retrieve the input field text and reset the count to zero 

        
        $('tr').find('td:not(:last)').each(function() { // Loop through the table td's except last column
 
            if ($(this).text().search(new RegExp(filter, "i")) < 0) { 
                $(this).fadeOut();
            
            } else { // Show the list item if the phrase matches and increase the count by 1
                
                $(this).show();
                count++;
            }
        });

        var numberItems = count;
        $("#filter-count").text("Number of search results : " +count);
    });

      //Set the validations for the modal popup
      jQuery.validator.setDefaults({
        debug: true,
        success: "valid"
      });

      $('#form').validate({
        rules: {
          username: {
            minlength: 4,
            maxlength: 20,
          },

          name: {
            minlength: 4,
            maxlength: 20,
          },

          email: {
            email: true,
            minlength: 8,
            maxlength: 30,
          },

          phone_number: {
            number: true,
            minlength: 10,
            maxlength: 10,
          },

          description: {
            minlength: 6,
            maxlength: 40,
          },

          password1: {
            minlength: 4,
            maxlength: 20,
          },

          password2: {
            minlength: 4,
            maxlength: 20,
            equalTo: "#password1",
          }
        }
      });

      //Clicking on a row to edit the user details

      $('#table').on('click', 'td:not(:last-child)', function () {
        var col1value = $(this).parent().find("td").first().text();
         edit_user(col1value);       
    } );

      //Script for searching the table

    $('#search').keyup(function(){
   var valThis = $(this).val().toLowerCase();
    $('#table td:not(:last-child)').each(function(){
     var text = $(this).text().toLowerCase();
        (text.indexOf(valThis) == 0) ? $(this).show() : $(this).hide();            
   });
});
    

      //Generate the table

      table = $('#table').DataTable({ 
        
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('admin/ajax_list')?>",
            "type": "POST"
        },

        //Set ini properties of datatable
        "columnDefs": [
        { 
          "targets":  [ -1 ] , //last column 
          "orderable": false, //set not orderable
        },
        /*{ "visible": false, "targets": 0 },*/
        { "sClass":"hide_me", 

        "targets":  0  },
        ],

      });
    
    });
  

    function add_user()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal
      $('.modal-title').text('Add User'); // Set Title to Bootstrap modal title
    }

    function edit_user(id)
    {
       
      $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('admin/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="id"]').val(data.user_id);  
            $('[name="username"]').val(data.username);
            $('[name="name"]').val(data.name);
            $('[name="email"]').val(data.email);
            $('[name="phone_number"]').val(data.phone_number);
            $('[name="description"]').val(data.description);
            
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit User'); // Set title to Bootstrap modal title

            

            
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }

    function reload_table()
    {
      table.ajax.reload(null,false); //reload datatable ajax 
    }

    function save()
    {
      var url;
      if(save_method == 'add') 
      {
          url = "<?php echo site_url('admin/ajax_add')?>";
      }
      else
      {
        url = "<?php echo site_url('admin/ajax_update')?>";
      }

       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
               $('#modal_form').modal('hide');
               reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    }

    function delete_user(id)
    {
      if(confirm('Are you sure delete this data?'))
      {
        // ajax delete data to database
          $.ajax({
            url : "<?php echo site_url('admin/ajax_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
               //if success reload ajax table
               $('#modal_form').modal('hide');
               reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
         
      }
    }

  </script>

  <!-- Bootstrap modal Add new user-->
  <div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Add a new user</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal" name="form">
          <input type="hidden" value="" name="id"/> 
          <div class="form-body">
            <div class="form-group">
            <label class="col-lg-3 control-label">Username:</label>
            <div class="col-lg-8">
              <input class="form-control" name="username" id="username" type="text">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Name:</label>
            <div class="col-lg-8">
              <input class="form-control" name="name" id="name" type="text">
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
              <input class="form-control" name="phone_number" id="phone_number">
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
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Confirm password:</label>
            <div class="col-md-8">
              <input class="form-control" name="password2" id="password2"  type="password">
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
            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->
  </body>
</html>