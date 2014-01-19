<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category_Model extends MY_MODEL
{
	function __construct()
	{
		parent::__construct();
		$this->tableName = CATEGORIES_TABLE;
	}
	
	public function getMainCategories()
	{
        return $this->db->where('parent_id', 0)->get($this->tableName)->result();
	}
	
	public function getSubcategories($categoryId){
	    return $this->db->where('parent_id', $categoryId)->get($this->tableName)->result();
	}
	
	public function hasSubcategories($categoryId){
		return $this->db->where('parent_id', $categoryId)->from($this->tableName)->count_all_results();
	}
}