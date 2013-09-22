<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends MY_CONTROLLER
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	public function index()
	{
	}

	public function upload_file()
	{
		$status = "";
		$msg = "";
		$file_element_name = 'userfile';

		$config['upload_path'] = UPLOAD_DIR;
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size']  = 500;
		$fileDate = date('siHdmY');
		$advertGuid = $this->session->userdata('advert_guid');
		$fileGuid = uniqid();
		$userId = $this->session->userdata('user_id');
		if($userId == false)
		{
			// TODO: handle user session expired.
			return;
		}
		$config['file_name'] = $fileDate.SEP.$userId.SEP.$advertGuid.SEP.$fileGuid;
		$this->load->library('upload', $config);
			
		if (!$this->upload->do_upload($file_element_name))
		{
			$status = 'error';
			$msg = $this->upload->display_errors('', '');
		}
		else
		{
			$data = $this->upload->data();
		}
		echo json_encode(array('status' => $status, 'msg' => $msg));
	}

	public function delete_file($file_id)
	{
		//unlink delete
	}

	public function files()
	{
		// make sure to create multiple temp file in master temp file?!?! ceva de genu
		//load files from temp
	}
}