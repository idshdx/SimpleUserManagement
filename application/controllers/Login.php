<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class login extends CI_Controller
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
          //load the login model
          $this->load->model('login_model');
          $this->load->library('grocery_CRUD');
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
               if ($_SERVER['REQUEST_METHOD'] == 'POST')
               {
                    $user_result = $this->login_model->validate_user($username, $password);
                    if ($user_result > 0) //active user record is present
                    {    
                         echo 'We found you in the database';
          
                        }
                        $admin_result = $this->login_model->validate_admin($username);
                        if($admin_result > 0) { //admin
                          
                          redirect('login/show_all_users'); 

                        } else { //not admin
                          
                          $data['result'] = $this->login_model->get_info_user($this->input->post('input_username'));
                          $this->load->view('view_profile', $data);
                          
                         
                        }
                        
                    }
                    else
                    {
                         echo 'Invalid username and password';
                        
                    }
               }
               
          }

    public function show_all_users()
    {
        $data['users'] = $this->login_model->get_info_all_users();
        $this->load->view('admin_view', $data);      
    }

    public function edit() {
      $this->load->view('edit_profile');
    }
    
    /*function edit(){
      //set validations
          $this->form_validation->set_rules("name", "Name", "trim");
          $this->form_validation->set_rules("password1", "First passoword", "trim|required");
          $this->form_validation->set_rules("password2", "Second passoword", "trim|required");
          $this->form_validation->set_rules("email", "Email", "trim");
          $this->form_validation->set_rules("description", "Description", "trim");
          $this->form_validation->set_rules("phone_number", "Phone Number", "numeric|trim");

      
      //get the posted values into an array(except passwords) for further use
          $data = array(
          'name' => $this->input->post('name'),
          'email' => $this->input->post('email'),
          'phone_number' => $this->input->post('phone_number'),
          'description' => $this->input->post('description') );
          
          $password1 = $this->input->post('password1');
          $password2 = $this->input->post('password2');

          $this->load->model('login_model');
          if($this->login_model->update_data($data)) {
            echo 'OK';
          } else {
            echo 'Error';
          }        
    }*/

}
?>