<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

define('ADVERT_TABLE', 'adverts');

class advert extends CI_Model
{
	var $category_id = "";
	var $title = "";
	var $description = "";
	var $price = "";
	var $currency = "";
	var $district = "";
	var $city = "";
	var $type = "";
	var $date = "";

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}

	function add_new_advert_to_db(){
		//$this->email = $this->input->post('email'); user_id
		$this->category_id = $this->input->post('category_id');
		$this->title = $this->input->post('title');
		$this->description = $this->input->post('description');
		$this->price = $this->input->post('price');
		$this->currency = $this->input->post('currency');
		$this->district = $this->input->post('district');
		$this->city = $this->input->post('city');
		$this->type = $this->input->post('type');
		$this->date = date('Y-m-d H:i:s');
		$this->db->insert(ADVERT_TABLE, $this);
	}

	function getAll()
	{
		return $this->db->get(ADVERT_TABLE)->result();
	}

	function getAllByCategoryId($categoryId)
	{
		return $this->db->get_where(ADVERT_TABLE, array('category_id'=>$categoryId))->result();
	}
	
	function searchByTitle($searchEntry){
		// pune max pe $searchEntry
		// verificare empty undeva, NU AICI
		$keywords = explode(" ", $searchEntry);
		foreach($keywords as $keyword){
			$this->db->like('title', $keyword);
		}
		return $this->db->get(ADVERT_TABLE)->result();
	}
}