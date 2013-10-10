<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Advert_Model extends MY_MODEL
{

    function __construct()
    {
        parent::__construct();
        $this->tableName = ADVERT_TABLE;
        $this->output->enable_profiler(TRUE);
    }

    function getByCategoryId($categoryId)
    {
        $this->db->select('adverts.id, category_id, user_id, district, city, type, title, description, price, currency, date, filename')->from($this->tableName);
        $this->db->join(ADVERT_FILES_TABLE, $this->tableName . '.id=' . ADVERT_FILES_TABLE . '.advert_id');
        $this->db->join(FILES_TABLE, FILES_TABLE . '.id=' . ADVERT_FILES_TABLE . '.file_id');
        $this->db->where($this->tableName.'.category_id', $categoryId);
        $this->db->like(FILES_TABLE.'.filename', 'thumb');
        return $this->db->get()->result();
    }

    function getByTitle($searchEntry)
    {
        // TODO: pune max pe $searchEntry
        // verificare empty undeva, NU AICI
        $keywords = explode(" ", $searchEntry);
        foreach ($keywords as $keyword) {
            $this->db->or_like('title', $keyword);
        }
        $this->db->select('adverts.id, category_id, user_id, district, city, type, title, description, price, currency, date, filename')->from($this->tableName);
        $this->db->join(ADVERT_FILES_TABLE, $this->tableName . '.id=' . ADVERT_FILES_TABLE . '.advert_id');
        $this->db->join(FILES_TABLE, FILES_TABLE . '.id=' . ADVERT_FILES_TABLE . '.file_id');
        $this->db->like(FILES_TABLE.'.filename', 'thumb');
        return $this->db->get()->result();
    }
}