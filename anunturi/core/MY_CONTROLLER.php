<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_CONTROLLER extends CI_Controller
{
	protected $data;
	private $layout;

	public function __construct()
	{
	    if(UNDER_CONSTRUCTION){
	        echo "Site under contruction";
	        exit();
	    }
		parent::__construct();
// 		$this->output->enable_profiler(TRUE);
		$this->load->model('files_model');
		$this->load->model('advert_model');
		$this->load->model('category_model');
		$this->load->model('advert_files_model');
		$this->load->model('user_model');
		$this->data['error'] = '';
		$this->layout = 'layout/_master';
		$this->load->library('form_validation');
		$this->load->library('pagination');
		$this->form_validation->set_message('required','Introduceti o valoare pentru %s.');
	}

	public function index()
	{
		$this->data['active_page'] = "index";
		$this->data['title'] = "Cauta";
		$this->loadView('layout/home');
	}

	public function about()
	{
		$this->data['active_page'] = "about";
		$this->data['title'] = "Despre";
		$this->loadView('layout/about');
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
		$this->data['main_categories'] = $this->category_model->getMainCategories();
		$this->checkIfUserDataIsSet();
		$this->data['is_logged'] = $this->session->userdata('is_logged');
		$this->data['username'] = $this->session->userdata('username');
		$this->data['content'] = $view_name;
		$this->load->view($this->layout, $this->data);
	}
}