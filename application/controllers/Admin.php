<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model','admin');
		$this->load->library('session');
      	$this->load->helper('form');
	    $this->load->helper('url');
	    $this->load->helper('html');
	    $this->load->database();
	    $this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('admin_view');
	}

	public function ajax_list()
	{
		$list = $this->admin->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $admin) {
			$no++;
			$row = array();
			$row[] = $admin->user_id;
			$row[] = $admin->username;
			$row[] = $admin->name;
			$row[] = $admin->email;
			$row[] = $admin->phone_number;
			$row[] = $admin->description;
		

			//add html for action
			$row[] = '<a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_user('."'".$admin->user_id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;

		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->admin->count_all(),
						"recordsFiltered" => $this->admin->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->admin->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$data = array(
				'username' => $this->input->post('username'),
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'phone_number' => $this->input->post('phone_number'),
				'description' => $this->input->post('description'),
				'type_id' => $this->input->post('user_type'),
				'age_id' => $this->input->post('user_age_category'),
				'password' => md5($this->input->post('password1'))
			);
		$insert = $this->admin->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$data = array(
				
				'username' => $this->input->post('username'),
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'phone_number' => $this->input->post('phone_number'),
				'description' => $this->input->post('description'),
				'type_id' => $this->input->post('user_type'),
				'age_id' => $this->input->post('user_age_category'),
				'password' => $this->input->post('password1')
			);
		$this->admin->update(array('user_id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->admin->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

}
