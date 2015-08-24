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
          $this->form_validation->set_rules("input_username", "Username", "trim|required|min_length[4]");
          $this->form_validation->set_rules("input_password", "Password", "trim|required|min_length[4]");

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
    
   /* function get_info_user(){
      $data = $this->user_model->get_info_user($this->input->post('input_username'));
      echo json_encode($data);
    }*/

    public function show_all_users() { //showing all users for admin_view

        $data['users'] = $this->user_model->get_info_all_users();

        $this->load->view('admin_view', $data);      
    }

    function edit() { //controller for edit function(update in db)

      

      //get only the posted values into an array and set the validations for each one
          if(!empty($this->input->post('name'))) { 
            $data['name'] = $this->input->post('name');
            $this->form_validation->set_rules("name", "Name", "trim|min_length[4]");
          };
          if(!empty($this->input->post('email'))) { 
            $data['email'] = $this->input->post('email');
            $this->form_validation->set_rules("email", "Email", "trim|valid_email|min_length[8]");
          };
          
          if(!empty($this->input->post('phone_number'))) { 
            $data['phone_number'] = $this->input->post('phone_number');
            $this->form_validation->set_rules("phone_number", "Phone Number", "numeric|trim|min_length[10]|max_length[10]");
          };
          if(!empty($this->input->post('description'))) { 
            $data['description'] = $this->input->post('description');
            $this->form_validation->set_rules("description", "Description", "trim|min_length[4]");
          };
          $data['age_id'] = $this->input->post('user_age_category');
          $password2 = md5($this->input->post('password2'));
          $password1 = md5($this->input->post('password1'));

          $this->form_validation->set_rules("password1", "First password", "trim|required|min_length[4]");
          $this->form_validation->set_rules("password2", "Second password", "trim|required|min_length[4]");

          if ($this->form_validation->run() == FALSE) { //validation fails 

               echo 'Eroare PHP: Nu s a trecut de validare';

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
      
      public function forget()
      {     
        $this->load->view('retrieve_password');
      }
      public function retrieve() {
        $email = $this->input->post('email');

        date_default_timezone_set('GMT');
        $this->load->helper('string');
        $password= random_string('alnum', 16);
        $this->db->where('email', $email);
        $this->db->update('users',array('password'=>MD5($password)));
        
        $this->load->library('email');
        $this->email->from('test@project.com', 'Admin');
        $this->email->to($email);     
        $this->email->subject('Password reset');
        $this->email->message('You have requested the new password, Here is you new password:'. $password); 
        $this->email->send();
      }

      public function test() {
        $this->load->view('test');
      }
}
?>