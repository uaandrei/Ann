<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_Model extends MY_MODEL 
{	
	public function __construct()
	{
		parent::__construct();
		$this->tableName = USERS_TABLE;
	}
	
	public function getUserByName($username)
	{
		return $this->db->get_where($this->tableName, array('username' => $username))->result();
	}
	
	public function getUserId($userData)
	{
		$result = $this->db->select('id')->get_where($this->tableName, $userData, 1)->row();
		if(count($result) == 1)
		{
			$id = $result->id;
		} else {
			$id = 0;
		}
		return $id;
	}
}