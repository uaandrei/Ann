<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {

	public function index()
	{
		$data['title'] = "Cauta";
		$this->loadView('search', $data);
	}

	public function about()
	{
		$data['title'] = "About";
		$this->loadView('about', $data);
	}

	public function category($categoryName)
	{
		$data['category_name'] = $categoryName;
		$data['title'] = 'Rezultate ' . $categoryName;
		$this->loadView('category_results_view', $data);
	}

	public function newAdvert()
	{
		$data['title'] = "Anunt nou";
		$this->loadView('add_new_advert_view', $data);
	}

	private function loadView($view_name, $data)
	{
		$this->load->model('category');
		$data['categories'] = $this->category->getAll();
		$this->load->view('__begin', $data);
		$this->load->view('_header', $data);
		$this->load->view($view_name);
		$this->load->view('_footer');
		$this->load->view('__end');
	}
}