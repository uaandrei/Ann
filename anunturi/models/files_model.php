<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Files_Model extends MY_MODEL
{
	public function __construct()
	{
		parent::__construct();
		$this->tableName = FILES_TABLE;
	}

	// TODO: review delete methods
	public function delete_file($file_id)
	{
		$file = $this->get_file($file_id);
		if (!$this->db->where('id', $file_id)->delete($this->tableName))
		{
			return FALSE;
		}
		unlink(UPLOAD_DIR . $file->filename);
		return TRUE;
	}
}