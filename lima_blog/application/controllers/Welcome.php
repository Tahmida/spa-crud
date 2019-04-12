<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model('Welcome_model',NULL,true);
		$data=array();
		$data['main_content']=$this->load->view('pages/home_content.php','',true);
		$data['sidebar_menu']=true;
		$data['all_published_category']=$this->Welcome_model->select_all_published_category();
		$this->load->view('master',$data);

	}
	public function portfolio()
	{
		$data=array();
		$data['main_content']=$this->load->view('pages/portfolio_content.php','',true);
		$this->load->view('master',$data);
	}

}
