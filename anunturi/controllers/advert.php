<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Advert extends MY_CONTROLLER
{
	public function search()
	{
		$this->data['title']="Rezultate cautare";
		$this->data['active_page']="";
		$searchEntry = $this->input->post('kwd');
		$this->data['kwd'] = $searchEntry;
		$this->data['advertResults'] = $this->advert_model->getByTitle($searchEntry);
		$this->loadView('advert_results_view');
	}

	public function createNewAdvert()
	{
		$this->data['active_page'] = "";
		$this->data['title'] = 'Anuntul a fost adaugat';
		// verify data first
		// if(datacorrect)
			
		$advertData = array(
				//'email' => $this->input->post('email'),
				'user_id' => $this->session->userdata('user_id'),
				'category_id' => $this->input->post('category_id'),
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'price' => $this->input->post('price'),
				'currency' => $this->input->post('currency'),
				'district' => $this->input->post('district'),
				'city' => $this->input->post('city'),
				'type' => $this->input->post('type'),
				'date' => date('Y-m-d H:i:s'),
		);
		
		$advertFile['advert_id'] = $this->advert_model->insert($advertData);

		$files = scandir(UPLOAD_DIR);
		$dest = './data/';
		foreach ($files as $file)
		{
			if(in_array($file, array('.','..'))) continue;
			$data['filename'] = $dest.$file;
			copy(UPLOAD_DIR.$file, $data['filename']);
			unlink(UPLOAD_DIR.$file);
			$advertFile['file_id'] = $this->files_model->insert($data);
			$this->advert_files_model->insert($advertFile);
		}

		$this->loadView('advert_created_view');
		// else
		// fail;
	}

	public function category($categoryId)
	{
		// redirect if categoryId doesn't exist
		$this->data['active_page'] = $categoryId;
		$this->data['title'] = 'Rezultate ' . $categoryId;
		$this->data['advertResults'] = $this->advert_model->getByCategoryId($categoryId);
		$this->loadView('advert_results_view');
	}

	public function show($advertId)
	{
		$this->data['active_page'] = "";
		$this->data['title'] = 'Vizualizare anunt';
		$this->data['advert'] = $this->advert_model->getById($advertId);
		$this->data['advert_files'] = $this->advert_files_model->getFilesForAdvert($advertId);
		$this->data['user_data'] = $this->user_model->getById($this->data['advert']->user_id);
		$this->loadView('advert_presentation', $this->data);
	}
}