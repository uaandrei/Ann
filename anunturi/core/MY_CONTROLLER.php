<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_CONTROLLER extends CI_Controller 
{
	protected $data;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('files_model');
		$this->load->model('advert_model');
		$this->load->model('category_model');
		$this->load->model('advert_files_model');
		$this->load->model('user_model');
		$this->data['error'] = '';
	}
	
	public function index()
	{
		$this->data['active_page'] = "index";
		$this->data['title'] = "Cauta";
		$this->loadView('home');
	}
	
	public function about()
	{
		$this->data['active_page'] = "about";
		$this->data['title'] = "Despre";
		$this->loadView('about');
	}
	
	protected function logoutCurrentUser()
	{
		$this->session->set_userdata('username', 'Guest');
		$this->session->set_userdata('user_id', 0);
		$this->session->set_userdata('is_logged', FALSE);
	}

	protected function checkIfUserDataIsSet()
	{
		if(!$this->session->userdata('is_logged'))
		{
			$this->logoutCurrentUser();
			return false;
		} else {
			return true;	
		}
	}

	protected function loadView($view_name)
	{
		$this->data['categories'] = $this->category_model->getAll();
		$this->checkIfUserDataIsSet();
		$this->data['is_logged'] = $this->session->userdata('is_logged');
		$this->data['username'] = $this->session->userdata('username');
		$this->load->view('__begin', $this->data);
		$this->load->view($view_name, $this->data);
		$this->load->view('__end');
	}
}