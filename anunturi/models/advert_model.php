<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Advert_Model extends MY_MODEL
{
	function __construct()
	{
		parent::__construct();
		$this->tableName = ADVERT_TABLE;
	}

	function getByCategoryId($categoryId)
	{
		return $this->db->get_where($this->tableName, array('category_id' => $categoryId))->result();
	}

	function getByTitle($searchEntry)
	{
		// TODO: pune max pe $searchEntry
		// verificare empty undeva, NU AICI
		$keywords = explode(" ", $searchEntry);
		foreach($keywords as $keyword)
		{
			$this->db->like('title', $keyword);
		}
		return $this->db->get($this->tableName)->result();
	}
}