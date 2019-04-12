<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Super_admin_model extends CI_Model {

	
	
	public function save_category_info($data){
		
		$this->db->insert('tbl_category',$data);

	}
	public function select_all_category(){
		$this->db->select('*');
		$this->db->from('tbl_category');
		$query_result=$this->db->get();
		$result=$query_result->result();
		return $result;
	}
	public function unpublished_category_by_category_id($category_id){
		$this->db->set('publication_status',0);
		$this->db->where('category_id',$category_id);
		$this->db->update('tbl_category');

	}
	public function published_category_by_category_id($category_id){
		$this->db->set('publication_status',1);
		$this->db->where('category_id',$category_id);
		$this->db->update('tbl_category');
	}
	public function delete_category_by_category_id($category_id){
		$this->db->where('category_id',$category_id);
		$this->db->delete('tbl_category');
	}
	public function edit_category_by_category_id($category_id){
		$this->db->select('*');
		$this->db->from('tbl_category');
		$this->db->where('category_id',$category_id);
		$query_result=$this->db->get();

		$category_info=$query_result->row();
		return $category_info;
	}
	public function update_category_by_id($data,$category_id){
		$this->db->where('category_id', $category_id);
        $this->db->update('tbl_category',$data);
	}
	public function select_all_published_category(){
    	$data=array();
    	$this->db->select('*');
    	$this->db->from('tbl_category');
    	$this->db->where('publication_status',1);
    	$query_result=$this->db->get();
    	$published_category=$query_result->result();
    	return $published_category;

    }
	public function save_blog_info($data){
		$this->db->insert('tbl_blog',$data);

	}

}
