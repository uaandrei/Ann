<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_MODEL extends CI_Model
{
	protected $tableName;

	public function __construct()
	{
		parent::__construct();
	}

	public function getById($id)
	{
		return $this->db->get_where($this->tableName, array('id'=>$id))->row();
	}
	
	public function insert($data)
	{
		$this->db->insert($this->tableName, $data);
		return $this->db->insert_id();
	}
	
	public function getAll()
	{
		return $this->db->get($this->tableName)->result();
	}
}