<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class edit_profile extends CI_Controller
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
          
     }

     public function index()
     {
          //get the posted values
          $username = $this->input->post('username');
          $password1 = $this->input->post('password1');
          $password2 = $this->input->post('password2');

          //set validations
          $this->form_validation->set_rules("username", "Username", "trim|required");
          $this->form_validation->set_rules("password1", "Password", "trim|required");
          $this->form_validation->set_rules("password2", "Password", "trim|required");

          if ($this->form_validation->run() == FALSE)
          {
               //validation fails
               $this->load->view('user_view');
          }
          else
          {
               //validation succeeds
               if ($_SERVER['REQUEST_METHOD'] == 'POST')
               {
                   //check if the username and both passwords are correct
                }          
          }
      }
  }
              