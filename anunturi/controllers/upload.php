<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Upload extends MY_CONTROLLER
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index()
    {}

    public function upload_file()
    {
        $status = "";
        $msg = "";
        $file_element_name = 'userfile';
        
        $configUpload['upload_path'] = UPLOAD_DIR;
        $configUpload['allowed_types'] = 'jpg|png|jpeg';
        $configUpload['max_size'] = 500;
        $fileDate = date('siHdmY');
        $advertGuid = $this->session->userdata('advert_guid');
        $fileGuid = uniqid();
        $userId = $this->session->userdata('user_id');
        if ($userId == false) {
            // TODO: handle user session expired.
            return;
        }
        $configUpload['file_name'] = $fileDate . SEP . $userId . SEP . $advertGuid . SEP . $fileGuid;
        $this->load->library('upload', $configUpload);
        
        if (! $this->upload->do_upload($file_element_name)) {
            $status = 'error';
            $msg = $this->upload->display_errors('', '');
        } else {
            $data = $this->upload->data();
            $configResize['image_library'] = 'gd2';
            $configResize['source_image'] = UPLOAD_DIR . $data['file_name'];
            $configResize['create_thumb'] = TRUE;
            $configResize['maintain_ratio'] = TRUE;
            $configResize['width'] = 200;
            $configResize['height'] = 200;
            $configResize['new_image'] = UPLOAD_DIR . $data['raw_name'] . $data['file_ext'];
            
            $this->load->library('image_lib', $configResize);
            
            $result = $this->image_lib->resize();
        }
        echo json_encode(array(
            'status' => $status,
            'msg' => $msg
        ));
    }

    public function delete_file($file_id)
    {
        // unlink delete
    }

    public function files()
    {
        $files = scandir(UPLOAD_DIR);
        $thumbs = array();
        foreach ($files as $file) {
            if (in_array($file, array(
                '.',
                '..'
            )))
                continue;
            if (! $this->isFileForThisAdvert($file))
                continue;
            if(strpos($file, "thumb")){
                array_push($thumbs, $file);
            }
        }
        $data['files'] = $thumbs;
        $this->load->view('files', $data);
    }

	private function isFileForThisAdvert($file)
	{
		$advertGuid = $this->session->userdata('advert_guid');
		$userId = $this->session->userdata('user_id');
		$cmp = explode(SEP, $file);
		return $cmp[1] == $userId && $cmp[2] == $advertGuid;
	}
}