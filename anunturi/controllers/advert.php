<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Advert extends MY_CONTROLLER
{

    public function search($offset = 0)
    {
        $this->data['title'] = "Rezultate cautare";
        $this->data['active_page'] = "";
        $searchEntry = $this->input->post('kwd');
        $this->data['kwd'] = $searchEntry;
        
        $limit = 10;
        $this->data['advertResults'] = $this->advert_model->getByTitle($searchEntry, $limit, $offset);
        $config = $this->getPaginationConfigForBoostrap();
        $config['base_url'] = base_url() . "advert/search";
        $config['total_rows'] = $this->db->like('title', $searchEntry)
            ->from(ADVERT_TABLE)
            ->count_all_results();
        $config['per_page'] = $limit;
        $this->pagination->initialize($config);
        $this->loadView('advert_results_view');
    }

    public function category($offset = 0)
    {
        $id = $this->input->get('c_id');
        if ($id) {
            $this->session->set_userdata('c_id', $id);
        } else {
            $id = $this->session->userdata('c_id');
        }
        $limit = 10;
        
        $this->data['active_page'] = $id;
        $this->data['title'] = 'Rezultate ' . $id;
        $this->data['advertResults'] = $this->advert_model->getByCategoryId($id, $limit, $offset);
        
        $config = $this->getPaginationConfigForBoostrap();
        $config['base_url'] = base_url() . "advert/category";
        $config['total_rows'] = $this->db->where("category_id", $id)
            ->from(ADVERT_TABLE)
            ->count_all_results();
        $config['per_page'] = $limit;
        $this->pagination->initialize($config);
        
        $this->loadView('advert_results_view');
    }

    public function createNewAdvert()
    {
        $this->data['active_page'] = "";
        $this->data['title'] = 'Anuntul a fost adaugat';
        
        $this->form_validation->set_rules('title', 'titlu', 'required');
        $this->form_validation->set_rules('description', 'descriere', 'required');
        $this->form_validation->set_rules('price', 'pret', 'required');
        
        if (! $this->form_validation->run()) {
            $this->loadView('add_new_advert_view');
            return;
        }
        $advertData = array(
            // 'email' => $this->input->post('email'),
            'user_id' => $this->session->userdata('user_id'),
            'category_id' => $this->input->post('category'),
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'price' => $this->input->post('price'),
            'currency' => $this->input->post('currency'),
            'district' => $this->input->post('district'),
            'city' => $this->input->post('city'),
            'type' => $this->input->post('type'),
            'date' => date('Y-m-d H:i:s')
        );
        
        if (! $this->category_model->getById($advertData['category_id'])) {
            echo "Aceasta categorie nu exista.";
            return;
        }
        
        $advertFile['advert_id'] = $this->advert_model->insert($advertData);
        
        $files = scandir(UPLOAD_DIR);
        
        $dest = './data/';
        $numberOfPicturesForAdvert = 0;
        foreach ($files as $file) {
            if (in_array($file, array(
                '.',
                '..'
            )))
                continue;
            if (! $this->isFileForThisAdvert($file))
                continue;
            $numberOfPicturesForAdvert++;
            $data['filename'] = $file;
            copy(UPLOAD_DIR . $file, $dest . $data['filename']);
            unlink(UPLOAD_DIR . $file);
            $advertFile['file_id'] = $this->files_model->insert($data);
            $this->advert_files_model->insert($advertFile);
        }

        if($numberOfPicturesForAdvert < 1){
            $this->data['error'] = 'Anuntul trebuie sa contina cel putin o poza.';
            $this->loadView('add_new_advert_view');
            return;
        }
        
        $this->loadView('advert_created_view');
    }

    public function show($advertId)
    {
        $this->data['title'] = 'Vizualizare anunt';
        $this->data['advert'] = $this->advert_model->getById($advertId);
        $this->data['active_page'] = $this->data['advert']->category_id;
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

    private function getPaginationConfigForBoostrap()
    {
        return array(
            'full_tag_open' => '<ul class="pagination">',
            'full_tag_close' => '</ul>',
            'first_tag_open' => '<li>',
            'first_link' => '&laquo;',
            'first_tag_close' => '</li>',
            'last_tag_open' => '<li>',
            'last_link' => '&raquo;',
            'last_tag_close' => '</li>',
            'next_tag_open' => '<li>',
            'next_link' => 'Inainte',
            'next_tag_close' => '</li>',
            'prev_tag_open' => '<li>',
            'prev_link' => 'Inapoi',
            'prev_tag_close' => '</li>',
            'cur_tag_open' => '<li class="active"><a href="#">',
            'cur_tag_close' => '<span class="sr-only">(current)</span></a></li>',
            'num_tag_open' => '<li>',
            'num_tag_close' => '</li>'
        );
    }
}