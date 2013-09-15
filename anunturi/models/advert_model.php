<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Advert_Model extends CI_Model
{

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}

	function add_new_advert_to_db($advertData)
	{
		$this->db->insert(ADVERT_TABLE, $advertData);
		return $this->db->insert_id();
	}

	function getAll()
	{
		return $this->db->get(ADVERT_TABLE)->result();
	}

	function getAllByCategoryId($categoryId)
	{
		return $this->db->get_where(ADVERT_TABLE, array('category_id' => $categoryId))->result();
	}

	function getById($id)
	{
		$result =  $this->db->get_where(ADVERT_TABLE, array('id' => $id))->result();
		if(count($result) >= 1)
		{
			return $result[0];
		} else {
			return null;
			// TODO: handle null
		} 
	}

	function searchByTitle($searchEntry)
	{
		// pune max pe $searchEntry
		// verificare empty undeva, NU AICI
		$keywords = explode(" ", $searchEntry);
		foreach($keywords as $keyword){
			$this->db->like('title', $keyword);
		}
		return $this->db->get(ADVERT_TABLE)->result();
	}
}