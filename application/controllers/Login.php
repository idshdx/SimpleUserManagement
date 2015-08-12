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

     public function index()
     {
          //get the posted values
          $username = $this->input->post('txt_username');
          $password = $this->input->post('txt_password');

          //set validations
          $this->form_validation->set_rules("txt_username", "Username", "trim|required");
          $this->form_validation->set_rules("txt_password", "Password", "trim|required");

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
                   /* //check if username and password is correct
                $this->db->where('username', $username);
                $this->db->where('password', md5($password));
                $result = $this->db->get('users');
      
                    // If we find a user output correct, else output wrong.
              if($result->num_rows() != 0)
              {
                echo 'Correct!';
              }
              else
              {
                echo 'Wrong!';
              }
              }
              }
              }  */
                    $user_result = $this->login_model->validate_user($username, $password);
                    if ($user_result > 0) //active user record is present
                    {
                         
                         echo 'We found you in the database';

                         //check if the user has admin rights, if valid send the admin to dashboard
                        /*$this->db->where('username', $username);
                        $this->db->where('password', md5($password));
                        $this->db->where('status', 'admin');
                        $result = $this->db->get('users');;
                        if ($result->num_rows() > 0) {
                        echo 'admin';
                        } else {
                          echo 'not admin';
                        }*/
                        $admin_result = $this->login_model->validate_admin($username, $password);
                        if($admin_result > 0) {
                          redirect('login/show_users'); //show all the users
                        } else {
                          redirect('login/show_user');
                        }
                        
                    }
                    else
                    {
                         echo 'Invalid username and password';
                        
                    }
               }
               
          }
     }
     public function check_password($password1, $password2) {
      
      
     }
     public function show_users()
    {
        $this->grocery_crud->set_table('users');
        $this->grocery_crud->unset_export();
        $this->grocery_crud->unset_print();

        $output = $this->grocery_crud->render();
 
        $this->_example_output($output);        
    }
    public function show_user()
    {
        /*$this->grocery_crud->set_table('users');
        $this->grocery_crud->unset_fields();
        $this->grocery_crud->unset_list();
        $this->grocery_crud->unset_operations();
        $this->grocery_crud->where('username', $this->input->post('txt_username'));
        
        $output = $this->grocery_crud->render();
 
        $this->_example_output($output); */ 
        $this->load->view('user_view');      
    }
 
    function _example_output($output = null)
 
    {
        $this->load->view('our_template.php',$output);    
    }

}?>