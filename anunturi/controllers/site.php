<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller 
{

	private $data;

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

	public function newAdvert()
	{
		$this->data['active_page'] = "newAdvert";
		$this->data['title'] = "Anunt nou";
		$this->loadView('add_new_advert_view');
	}

	public function search(){
		$this->data['title']="Rezultate cautare";
		$this->data['active_page']="";
		$searchEntry = $this->input->post('kwd');
		$this->data['kwd'] = $searchEntry;
		$this->data['advertResults'] = $this->advert_model->searchByTitle($searchEntry);
		$this->loadView('advert_results_view');
	}

	public function category($categoryId)
	{
		// redirect if categoryId doesn't exist
		$this->data['active_page'] = $categoryId;
		$this->data['title'] = 'Rezultate ' . $categoryId;
		$this->data['advertResults'] = $this->advert_model->getAllByCategoryId($categoryId);
		$this->loadView('advert_results_view');
	}

	public function createNewAdvert()
	{
		$this->data['active_page'] = "";
		$this->data['title'] = 'Anuntul a fost adaugat';
		// verify data first
		// if(datacorrect)
		$advertId = $this->advert_model->add_new_advert_to_db();

		$files = scandir(UPLOAD_DIR);
		$dest = './data/';
		foreach ($files as $file)
		{
			if(in_array($file, array('.','..'))) continue;
			copy(UPLOAD_DIR.$file, $dest.$file);
			unlink(UPLOAD_DIR.$file);
			$fileId = $this->files_model->insert_file($dest.$file);
			$this->advert_files_model->insert_file_for_advert($advertId, $fileId);
		}

		$this->loadView('advert_created_view');
		// else
		// fail;
	}

	public function show($advertId)
	{
		$this->data['active_page'] = "";
		$this->data['title'] = 'Vizualizare anunt';
		$this->data['advert'] = $this->advert_model->getById($advertId);
		$this->data['advert_files'] = $this->advert_files_model->getFilesForAdvert($advertId);
		$this->loadView('advert_presentation', $this->data);
	}
	
	public function login()
	{
		$this->data['active_page'] = "";
		$this->data['title'] = 'Autentificare';
		$this->loadView('user_login_view');
	}
	
	public function newUser()
	{
		$this->data['active_page'] = "";
		$this->data['title'] = 'Utilizator nou';
		$this->loadView('new_user_view');	
	}
	
	public function submitLogin()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		if($this->user_model->checkUser($username, $password))
		{
			$this->data['error'] = "";	
			$this->session->set_userdata('is_logged', true);
			$this->session->set_userdata('username', $username);
			$this->index();		
		} else {
			$this->data['error'] = "Ati gresiti datele de autentificare.";
			$this->login();
		}
	}

	public function addNewUser()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$userCount = count($this->user_model->getUserByName($username));
		if($userCount == 0)
		{
			$this->data['error'] = '';
			$this->user_model->addNewUserToDb($username, $password);
			$this->session->set_userdata('is_logged', true);
			$this->session->set_userdata('username', $username);
			$this->index();
		} else {
			$this->data['error'] = 'Nume de utilizator folosit';
			$this->newUser();
		}
	}
	
	public function logout()
	{
		$this->session->set_userdata('is_logged', false);
		$this->session->set_userdata('username', 'Guest');
		$this->index();
	}
	
	private function loadView($view_name)
	{
		$this->data['categories'] = $this->category_model->getAll();
		$this->setupSession();
		$this->data['is_logged'] = $this->session->userdata('is_logged');
		$this->data['username'] = $this->session->userdata('username');
		$this->load->view('__begin', $this->data);
		$this->load->view($view_name, $this->data);
		$this->load->view('__end');
	}
	
	private function setupSession()
	{
		if(!$this->session->userdata('username'))
		{
			$this->session->set_userdata('username', 'Guest');
			$this->session->set_userdata('is_logged', FALSE);
		}
	}
}