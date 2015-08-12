<?php
Class Login_model extends CI_Model
{
	function __construct() {
        parent::__construct();
        $this->load->database();
    }
 
    public function validate_user($username, $password) {
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        $result = $this->db->get('users');;
        return $result->num_rows();
    }
    
    function validate_admin($username,$password)
    {   
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        $this->db->where('status', 'admin');
        $result = $this->db->get('users');
        if ($result->num_rows() != 1) {
        return false;
        } else {
            return $result->num_rows(); 
        }
    }


    function __destruct() {
        $this->db->close();
    }
}