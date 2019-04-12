<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Super_admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
				$this->load->model('Super_admin_model',NULL,true);

		$admin_id=$this->session->userdata('admin_id');
		// echo $admin_id;
		// exit();
	    if($admin_id==NULL){
		redirect('admin');
	
         }

	}

	public function index()
	{
		//echo "in admin";
		$data=array();
		$data['dashboard_content']=$this->load->view('admin/pages/dashboard_content.php','',true);
		$this->load->view('admin/admin_master',$data);
	}

	public function add_category(){
		$data=array();
		$data['dashboard_content']=$this->load->view('admin/pages/add_category.php','',true);
		$this->load->view('admin/admin_master',$data);

	}
	public function save_category(){
		$this->load->model('Super_admin_model',NULL,true);
		$data=array();
		$data['category_name']=$this->input->post('category_name');
		$data['category_description']=$this->input->post('category_description');
		$data['publication_status']=$this->input->post('publication_status');
		$this->Super_admin_model->save_category_info($data);
		$data=array();
		$data['message']='category info save successfully';
		$this->session->set_userdata($data);
		redirect('Super_admin/add_category');
	}
	public function manage_category(){
		$this->load->model('Super_admin_model',NULL,true);

		$data=array();
		$data['all_category']=$this->Super_admin_model->select_all_category();
		$data['dashboard_content']=$this->load->view('admin/pages/manage_category.php',$data,true);
        $this->load->view('admin/admin_master',$data);        
	}

    public function unpublished_category_by_id($category_id){
    	$this->load->model('Super_admin_model',NULL,true);
    	$this->Super_admin_model->unpublished_category_by_category_id($category_id);
    	redirect('Super_admin/manage_category');
    }


    public function published_category_by_id($category_id){
    	//$this->load->model('Super_admin_model',NULL,true);
        $this->Super_admin_model->published_category_by_category_id($category_id);
        redirect('Super_admin/manage_category');
    }

    public function delete_category_by_id($category_id){
    	$this->Super_admin_model->delete_category_by_category_id($category_id);
    	redirect('Super_admin/manage_category');


    }

    public function edit_category($category_id){
    	$data=array();
    	$data['category_info']=$this->Super_admin_model->edit_category_by_category_id($category_id);
    	// echo '<pre>';
    	// print_r($category_info);
    	// exit();
    	$data['dashboard_content']=$this->load->view('admin/pages/edit_category.php',$data,true);
    	$this->load->view('admin/admin_master',$data);

    }

    public function update_category(){
    	$category_id=$this->input->post('category_id');
    	$data=array();
    	$data['category_name']=$this->input->post('category_name');
    	$data['category_description']=$this->input->post('category_description');
    	$data['publication_status']=$this->input->post('publication_status');
    	$this->Super_admin_model->update_category_by_id($data,$category_id);
    	$sdata=array();
    	$sdata['message']='update category info successfully';
    	$this->session->set_userdata($sdata);
    	redirect('Super_admin/edit_category/'.$category_id);

    }

    public function add_blog(){
    	$data=array();
    	$data['published_category']=$this->Super_admin_model->select_all_published_category();
    	$data['dashboard_content']=$this->load->view('admin/pages/add_blog.php',$data,true);
    
    	$this->load->view('admin/admin_master',$data);


    }



    public function save_blog(){
    	$data=array();
    	$data['blog_title']=$this->input->post('blog_title');
    	$data['category_id']=$this->input->post('category_id');
    	$data['blog_short_description']=$this->input->post('blog_short_description');
    	$data['blog_long_description']=$this->input->post('blog_long_description');
    	$data['author_name']=$this->input->post('author_name');
    	$data['publication_status']=$this->input->post('publication_status');
        $this->Super_admin_model->save_blog_info($data);

        $sdata=array();
        $sdata['message']='save blog info successfully';
        $this->session->set_userdata($sdata);
        redirect('Super_admin/add_blog');

    }





	public function logout(){
		$this->session->unset_userdata('admin_id');
		$this->session->unset_userdata('admin_name');
		$data=array();
		$data['message']='You are successfully logout';
		$this->session->set_userdata($data);
		redirect('admin');
	}
	

}
