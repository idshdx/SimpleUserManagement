<?php
class edit extends CI_Controller
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
          $name = $this->input->post('name');
          $password1 = $this->input->post('password1');
          $password2 = $this->input->post('password2');
          $email = $this->input->post('email');
          $phone_number = $this->input->post('phone_number');
          $description = $this->input->post('description');

               if ($_SERVER['REQUEST_METHOD'] == 'POST')
               {
                    $this->load->view('eroare');
          }
      }
}
?>