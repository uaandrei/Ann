<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Files_Model extends CI_Model {

	public function insert_file($filename)
	{
		$data = array(
				'filename' => $filename
		);
		$this->db->insert(FILES_TABLE, $data);
		return $this->db->insert_id();
	}
	 
	public function get_files()
	{
		return $this->db->select()
		->from(FILES_TABLE)
		->get()
		->result();
	}
	
	public function delete_file($file_id)
	{
		$file = $this->get_file($file_id);
		if (!$this->db->where('id', $file_id)->delete(FILES_TABLE))
		{
			return FALSE;
		}
		unlink(UPLOAD_DIR . $file->filename);
		return TRUE;
	}
	 
	public function get_file($file_id)
	{
		return $this->db->select()
		->from(FILES_TABLE)
		->where('id', $file_id)
		->get()
		->row();
	}
}