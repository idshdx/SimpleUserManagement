<?php
Class User_model extends CI_Model
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
    
    //Change password

    function update_password($oldpassword, $newpassword) {
        $newpassword = array( 'password' => $newpassword);
        $this->db->from('users');
        $this->db->where('password', $oldpassword);
        $this->db->update('users', $newpassword);
        return true;
    }

    //function to update a record
    
    function update_data($data, $password) {
        $this->db->from('users');
        $this->db->where('password', $password);
        $this->db->update('users', $data);
        return true;
    }

    function insert_data($data) {
        $this->db->insert('users', $data);
        return true; 
    }

    function delete($username, $id) {
        $this->db->from($this->table);
        $this->db->where('id',$id);
        $query = $this->db->get();

        return $query->row();
    }


    function __destruct() {

        $this->db->close();
    }

}