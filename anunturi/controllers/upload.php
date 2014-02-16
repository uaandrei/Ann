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
        $configUpload['max_size'] = '2048';
		$configUpload['max_width']  = '1024';
		$configUpload['max_height']  = '768';
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

    public function delete_file()
    {
        $pictureName = $this->input->post('file_name');
        $this->files_model->delete_file($pictureName);
    }

    public function files()
    {
        $thumbs = $this->getFilesUploadedForCurrentAdvert("thumb");
        $data['files'] = $thumbs;
        $this->load->view('files', $data);
    }
}