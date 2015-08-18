<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class main extends CI_Controller
{

     public function __construct()
     {
          parent::__construct();
          $this->load->library('session');
          $this->load->helper('form');
          $this->load->helper('url');
          $this->load->helper('html');
          $this->load->database();
          $this->load->library('form_validation');
          //load the login model and table library
          $this->load->model('user_model');
          $this->load->library('table');
          
     }
     public function index() {
      $this->load->view('login_view');

     }
     
     public function login_check()
     {
          //get the posted values
          $username = $this->input->post('input_username');
          $password = $this->input->post('input_password');

          //set validations
          $this->form_validation->set_rules("input_username", "Username", "trim|required");
          $this->form_validation->set_rules("input_password", "Password", "trim|required");

          if ($this->form_validation->run() == FALSE)
          {
               //validation fails
               $this->load->view('login_view');
          }
          else
          {
               //validation succeeds
               if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                    $user_result = $this->user_model->validate_user($username, $password);
                    if ($user_result > 0) { //active user record is present    
          
                        $admin_result = $this->user_model->validate_admin($username);

                        if($admin_result > 0) { //admin
                          
                          redirect('main/show_all_users'); 

                        } else { //not admin
                          
                          $data['result'] = $this->user_model->get_info_user($this->input->post('input_username'));
                          $this->load->view('edit_profile', $data);
                            
                        }
                        
                    } else {

                         echo 'Invalid username and password';
                        
                    }
               }    
          }
    }

    public function show_all_users() { //showing all users for admin_view

        $data['users'] = $this->user_model->get_info_all_users();

        $this->load->view('admin_view', $data);      
    }

    function edit() { //controller for edit function(update in db)

      //get only the posted values into an array
          if(!empty($this->input->post('name'))) { 
            $data['name'] = $this->input->post('name');
          };
          if(!empty($this->input->post('email'))) { 
            $data['email'] = $this->input->post('email');
          };
          
          if(!empty($this->input->post('phone_number'))) { 
            $data['phone_number'] = $this->input->post('phone_number');
          };
          if(!empty($this->input->post('description'))) { 
            $data['description'] = $this->input->post('description');
          };
          $data['age_id'] = $this->input->post('user_age_category');
          $password2 = md5($this->input->post('password2'));
          $password1 = md5($this->input->post('password1'));
          

      //set validations
          $this->form_validation->set_rules("name", "Name", "trim");
          $this->form_validation->set_rules("password1", "First password", "trim|required");
          $this->form_validation->set_rules("password2", "Second password", "trim|required");
          $this->form_validation->set_rules("email", "Email", "trim");
          $this->form_validation->set_rules("description", "Description", "trim");
          $this->form_validation->set_rules("phone_number", "Phone Number", "numeric|trim");

          if ($this->form_validation->run() == FALSE) { //validation fails 

               echo 'Nu s-a trecut de validare';

          } else {

              if($this->user_model->update_data($data, $password1)) { 
               
                echo 'The following records were updated in the database:';
                  if(!empty($data['name'])) {
                    echo $data['name'] . "<br>";
                  }
                  if(!empty($data['email'])) {
                    echo $data['email'] . "<br>";
                  }
                  if(!empty($data['phone_number'])) {
                    echo $data['phone_number'] . "<br>";
                  }
                  if(!empty($data['description'])) {
                    echo $data['description'] . "<br>";
                  }
                  if(!empty($data['age_id'])) {
                    echo $data['age_id'] . "<br>";
                  }
              } else {

                echo 'Error editing the records in the database';
                
              }
          }
   }
      
      //function to create new users(insert a new record into database)
      
      public function add_new_user() {
        //get the posted values
          $data = array(
          'username' =>     $this->input->post('username'),
          'name'=>          $this->input->post('name'),
          'password' =>     $this->input->post('password1'),
          'email' =>        $this->input->post('email'),
          'phone_number' => $this->input->post('phone_number'),
          'description' =>  $this->input->post('description'),
          'type_id'=>       $this->input->post('user_type'),
          'age_id'=>        $this->input->post('user_age_category'));

          $this->user_model->insert_data($data);
          /*echo json_encode(array("status" => TRUE));*/
          

           /* if($this->user_model->insert_data($data)) {
              echo 'A new user has been created';
            } else {
              echo 'Error adding a new user';
            }*/
      }
      

      public function test() {
        $this->load->view('test');
      }

      public function admin_list() { //table generated in controller

        $this->table->set_heading('Username', 'Name', 'Email', 'Phone Number', 'Description','Role','Age Category','Actions');

        $result = $this->user_model->get_table($per_page,$offset);

        foreach($result as $row) { 

        $links  = anchor('main/edit/' ,'Edit');
        $links .= anchor('main/delete/', 'Delete');

        $this->table->add_row(
            $row->username,
            $row->name,
            $row->email,
            $row->phone_number,
            $row->description,
            $row->type_id,
            $row->age_id,
            $links   
        );
        }
        $viewdata['#admintable'] = $this->table->generate();
    
    }
}
?>