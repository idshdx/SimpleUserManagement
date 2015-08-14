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
    
    function validate_admin($username)
    {   
        $this->db->where('username', $username);
        $this->db->where('type_id', 1); //match for a username with the corresponding value for admin(value 1)
        $query = $this->db->get('users');
       return $query->num_rows();
    }

    function get_info_all_users() {
        $this->db->select("username, name, email, phone_number, description, type, age_category");
        $this->db->from('users');
        $this->db->join('type', 'users.type_id = type.type_id');
        $this->db->join('age_category', 'users.age_id = age_category.age_id');
        $query = $this->db->get();
        return $query->result(); 
    }

    function get_info_user($username) {
        $this->db->select("username, name, email, phone_number, description, type, age_category");
        $this->db->from('users');
        $this->db->join('type', 'users.type_id = type.type_id');
        $this->db->join('age_category', 'users.age_id = age_category.age_id');
        $this->db->where('username', $username);
        $query= $this->db->get();
        
        return $query->row_array();
    }

    /*function get_info_user($username) {
        $this->db->select("username, name, email, phone_number, description, type");
        $this->db->from('users');
        $this->db->join('type', 'users.type_id = type.type_id');
        $query = $this->db->get();
        
        return $query->row_array();
    }*/
    //function to update record
    function update_data($data) {
        extract($data);
        $this->db->where();
        $this->db->update('users', array());
        return true;
    }


    function __destruct() {
        $this->db->close();
    }
}