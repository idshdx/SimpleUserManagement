<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
      $this->load->model('admin_model','admin');
      $this->load->helper('form');
      $this->load->helper('url');
      $this->load->helper('html');
      $this->load->database();
      $this->load->library('form_validation');
  }
  function index() {

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

    public function change_pass() {
      $this->load->view('change_pass');
    }

    public function new_password() {
      //get the posted values
      $password1 = $this->input->post('input_newpassword1');
      $password2 = $this->input->post('input_newpassword2');
      if($password1 != $password2) {
        echo 'The new passwords did not match';
      } else {
        echo 'OK'; // update db where the old pass matches against the db
      }
    }
}
?>