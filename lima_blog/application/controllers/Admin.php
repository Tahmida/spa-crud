<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$admin_id=$this->session->userdata('admin_id');
		// echo $admin_id;
		// exit();
	    if($admin_id!=NULL){
		redirect('super_admin');
	
         }
	}
	public function index()
	{
		//echo "in admin";
		$data=array();
		//$data['main_content']=$this->load->view('admin/admin_login.php','',true);
		$this->load->view('admin/admin_login');

	}
	public function admin_login_check(){
		$email_address=$this->input->post('email_address');
		$admin_password=$this->input->post('admin_password');
		$result=$this->Admin_model->admin_login_check_info($email_address,$admin_password);
		// echo '<pre>';
		// print_r($result);exit();$
		if($result){
			$data['admin_id']=$result->admin_id;
			$data['admin_name']=$result->admin_name;
			$this->session->set_userdata($data);

		redirect('Super_admin');
	}
	else{
		$data['exception']="user id or password is invalid";
		$this->session->set_userdata($data);


        redirect('admin');
	}

	}
	// public function portfolio()
	// {
	// 	$data=array();
	// 	$data['main_content']=$this->load->view('pages/portfolio_content.php','',true);
	// 	$this->load->view('master',$data);
	// }

}
