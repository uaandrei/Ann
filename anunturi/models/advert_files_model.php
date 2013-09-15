<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Advert_Files_Model extends CI_Model 
{
	public function insert_file_for_advert($advertId, $fileId)
	{
		$data = array(
					'file_id' => $fileId,
					'advert_id' => $advertId
				);
		$this->db->insert(ADVERT_FILES_TABLE, $data);
	}
	
	public function getFilesForAdvert($advertId)
	{
		$this->db->select('*');
		$this->db->from(FILES_TABLE);
		$this->db->join(ADVERT_FILES_TABLE, ADVERT_FILES_TABLE.'.file_id = '.FILES_TABLE.'.id');
		$this->db->where(ADVERT_FILES_TABLE.'.advert_id', $advertId);
		return $this->db->get()->result();
	}
}
