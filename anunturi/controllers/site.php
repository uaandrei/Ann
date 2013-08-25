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
	
	public function search(){
		$data['title']="Rezultate cautare";
		$data['active_page']="";
		$this->load->model('advert');
		$searchEntry = $this->input->post('kwd');
		$data['kwd'] = $searchEntry;
		$data['advertResults'] = $this->advert->searchByTitle($searchEntry);
		$this->loadView('advert_results_view',$data);
	}

	public function category($categoryId)
	{
		// redirect if categoryId doesn't exist
		$data['active_page'] = $categoryId;
		$data['title'] = 'Rezultate ' . $categoryId;
		$this->load->model('advert');
		$data['advertResults'] = $this->advert->getAllByCategoryId($categoryId);
		$this->loadView('advert_results_view', $data);
	}

	public function createNewAdvert()
	{
		$data['active_page'] = "";
		$data['title'] = 'Anuntul a fost adaugat';
		// verify data first
		// if(datacorrect)
		$this->load->model('advert');
		$this->advert->add_new_advert_to_db();
		$this->loadView('advert_created_view', $data);
		// else
		// fail;
	}

	private function loadView($view_name, $data)
	{
		$this->load->model('category');
		$data['categories'] = $this->category->getAll();
		$this->load->view('__begin', $data);
		$this->load->view($view_name, $data);
		$this->load->view('__end');
	}
}