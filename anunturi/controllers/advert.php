<?php

if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Advert extends MY_CONTROLLER
{

    public function search()
    {
        $this->data['title'] = "Rezultate cautare";
        $this->data['active_page'] = "";
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
            // 'email' => $this->input->post('email'),
            'user_id' => $this->session->userdata('user_id'),
            'category_id' => $this->input->post('categoryInput'),
            'title' => $this->input->post('titleInput'),
            'description' => $this->input->post('descriptionInput'),
            'price' => $this->input->post('priceInput'),
            'currency' => $this->input->post('"currencyInput"'),
            'district' => $this->input->post('districtInput'),
            'city' => $this->input->post('cityInput'),
            'type' => $this->input->post('typeInput'),
            'date' => date('Y-m-d H:i:s')
        );
        
        $advertFile['advert_id'] = $this->advert_model->insert($advertData);
        
        $files = scandir(UPLOAD_DIR);
        $dest = './data/';
        foreach ($files as $file) {
            if (in_array($file, array(
                '.',
                '..'
            )))
                continue;
            if (! $this->isFileForThisAdvert($file))
                continue;
            $data['filename'] = $file;
            copy(UPLOAD_DIR . $file, $dest . $data['filename']);
            unlink(UPLOAD_DIR . $file);
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
        $category = $this->advert_model->getByCategoryId($categoryId);
        $this->data['advertResults'] = $category;
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

	private function isFileForThisAdvert($file)
	{
		$advertGuid = $this->session->userdata('advert_guid');
		$userId = $this->session->userdata('user_id');
		$cmp = explode(SEP, $file);
		return $cmp[1] == $userId && $cmp[2] == $advertGuid;
	}
}