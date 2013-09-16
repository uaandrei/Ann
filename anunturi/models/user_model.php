<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_Model extends CI_Model 
{
	public function addNewUserToDb($userData)
	{
		$this->db->insert(USERS_TABLE, $userData);
		return $this->db->insert_id();
	}
	
	public function getUserByName($username)
	{
		return $this->db->get_where(USERS_TABLE, array('username' => $username))->result();
	}
	
	public function getUserId($userData)
	{
		$result = $this->db->select('id')->get_where(USERS_TABLE, $userData, 1)->row();
		if(count($result) == 1)
		{
			$id = $result->id;
		} else {
			$id = 0;
		}
		return $id;
	}
	
	public function getById($id)
	{
		return $this->db->get_where(USERS_TABLE, array('id'=>$id))->row();
	}
}