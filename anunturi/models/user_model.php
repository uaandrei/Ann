<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_Model extends CI_Model 
{
	public function addNewUserToDb($username, $password)
	{
		$newUserData = array(
				'username' => $username,
				'password' => $password	
		);
		$this->db->insert(USERS_TABLE, $newUserData);
	}
	
	public function getUserByName($username)
	{
		return $this->db->get_where(USERS_TABLE, array('username' => $username))->result();
	}
	
	public function checkUser($username, $password)
	{
		$query = $this->db->get_where(USERS_TABLE, array('username' => $username, 'password' => $password), 1);
		$count = count($query->result());
		return $count == 1;
	}
}