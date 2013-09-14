<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_Model extends CI_Model 
{
	public function addNewUserToDb($userData)
	{
		$this->db->insert(USERS_TABLE, $userData);
	}
	
	public function getUserByName($username)
	{
		return $this->db->get_where(USERS_TABLE, array('username' => $username))->result();
	}
	
	public function checkUser($userData)
	{
		$query = $this->db->get_where(USERS_TABLE, $userData, 1);
		$count = count($query->result());
		return $count == 1;
	}
}