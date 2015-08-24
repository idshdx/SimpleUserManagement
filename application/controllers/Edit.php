<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
      
      $this->load->model('user_model', 'user');
      $this->load->helper('form');
      $this->load->helper('url');
      $this->load->helper('html');
      $this->load->database();
      $this->load->library('form_validation');
  }
  function index() {

      
      $this->load->model('user_model', 'user');
      $this->load->helper('form');
      $this->load->helper('url');
      $this->load->helper('html');
      $this->load->database();
      $this->load->library('form_validation');

      if($_POST['action'] == 'Update') {

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

                if($this->user->update_data($data, $password1)) { 
                 
                    echo json_encode(array("status" => TRUE));
                
                } else {

                echo 'Error editing the records in the database';
                
                }
            }
     

      } else if($_POST['action'] == 'Back') {

        $this->load->view('main');

      } else {

        $this->load->view('change_pass');

      }
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

                if($this->user->update_data($data, $password1)) { 
                    $data = $this->user->update_data($data, $password1);
                    echo json_encode($data);
                    /*echo json_encode(array("status" => TRUE));*/
                
                } else {

                echo 'Error editing the records in the database';
                
                }
     }
   }

    public function change_pass() {
      $this->load->view('change_pass');
    }

    public function new_password() {
    
      //get the posted values
      $oldpassword = md5($this->input->post('input_oldpassword'));
      $password1 = $this->input->post('input_newpassword1');
      $password2 = $this->input->post('input_newpassword2');

      if($password1 != $password2) {

        echo 'The new passwords did not match';

      } else { // update db where the old pass matches against the db
         
          $result = $this->user->update_password($oldpassword, md5($this->input->post('input_newpassword1')));

          if($result) {
            
            echo json_encode(array("status" => TRUE));

          } else {
            echo 'PHP ERROR: Error changing your password';
          }
      }
    }
}
?>