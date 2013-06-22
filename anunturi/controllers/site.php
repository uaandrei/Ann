<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {
	private $data = array();
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->data['title'] = "Cauta";
		$this->loadView('search');
	}

	public function about()
	{
		$this->data['title'] = "About";
		$this->loadView('about');
	}

	public function loadView($view_name)
	{
		$this->load->view('__begin', $this->data);
		$this->load->view('_header');
		$this->load->view($view_name);
		$this->load->view('_footer');
		$this->load->view('__end');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */