<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {

	public function index()
	{
		$data['active_page'] = "index";
		$data['title'] = "Cauta";
		$this->loadView('home', $data);
	}

	public function about()
	{
		$data['active_page'] = "about";
		$data['title'] = "Despre";
		$this->loadView('about', $data);
	}

	public function newAdvert()
	{
		$data['active_page'] = "newAdvert";
		$data['title'] = "Anunt nou";
		$this->loadView('add_new_advert_view', $data);
	}

	public function category($categoryName)
	{
		$data['active_page'] = $categoryName;
		$data['category_name'] = $categoryName;
		$data['title'] = 'Rezultate ' . $categoryName;
		$this->loadView('category_results_view', $data);
	}

	public function createNewAdvert()
	{
		$data['active_page'] = "";
		$data['title'] = 'Anuntul a fost adaugat'; 
		$email = $this->input->post('email');
		$this->loadView('advert_created_view', $data);
	}

	private function loadView($view_name, $data)
	{
		$this->load->model('category');
		$data['categories'] = $this->category->getAll();
		$this->load->view('__begin', $data);
		$this->load->view($view_name);
		$this->load->view('__end');
	}
}