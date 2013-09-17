<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Advert_Files_Model extends MY_MODEL 
{
	public function __construct()
	{
		parent::__construct();
		$this->tableName = ADVERT_FILES_TABLE;
	}
	
	public function getFilesForAdvert($advertId)
	{
		$this->db->select('*');
		$this->db->from(FILES_TABLE);
		$this->db->join($this->tableName, $this->tableName.'.file_id = '.FILES_TABLE.'.id');
		$this->db->where($this->tableName.'.advert_id', $advertId);
		return $this->db->get()->result();
	}
}
