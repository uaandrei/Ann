<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Advert_Model extends MY_MODEL
{

    function __construct()
    {
        parent::__construct();
        $this->tableName = ADVERT_TABLE;
        //$this->output->enable_profiler(TRUE);
    }

    function getByCategoryId($categoryId)
    {
        $sql = "select adverts.id, category_id, user_id, district, city, type, title, description, price, currency, date, filename from adverts
                join (select file_id, advert_id from advert_files
                    join files on files.id = advert_files.file_id
                    where filename like '%thumb%'
                    group by advert_id) t 
                on t.advert_id = adverts.id
                join files on files.id = file_id
                where category_id = ?";
        // $this->db->select('adverts.id, category_id, user_id, district, city, type, title, description, price, currency, date, filename')->from($this->tableName);
        // $this->db->join(ADVERT_FILES_TABLE, $this->tableName . '.id=' . ADVERT_FILES_TABLE . '.advert_id');
        // $this->db->join(FILES_TABLE, FILES_TABLE . '.id=' . ADVERT_FILES_TABLE . '.file_id');
        // $this->db->where($this->tableName . '.category_id', $categoryId);
        // $this->db->like(FILES_TABLE . '.filename', 'thumb');
        return $this->db->query($sql, $categoryId)->result();
    }

    function getByTitle($searchEntry, $limit, $offset)
    {
        // TODO: pune max pe $searchEntry
        // verificare empty undeva, NU AICI
        // $keywords = explode(" ", $searchEntry);
        // foreach ($keywords as $keyword) {
        // $this->db->like('title', $searchEntry);
        // // }
        // $this->db->select('adverts.id, category_id, user_id, district, city, type, title, description, price, currency, date, filename')->from($this->tableName);
        // $this->db->join(ADVERT_FILES_TABLE, $this->tableName . '.id=' . ADVERT_FILES_TABLE . '.advert_id');
        // $this->db->join(FILES_TABLE, FILES_TABLE . '.id=' . ADVERT_FILES_TABLE . '.file_id');
        // $this->db->like(FILES_TABLE . '.filename', 'thumb');
        $sql = "select adverts.id, category_id, user_id, district, city, type, title, description, price, currency, date, filename from adverts
                join (select file_id, advert_id from advert_files
                    join files on files.id = advert_files.file_id
                    where filename like '%thumb%'
                    group by advert_id) t
                on t.advert_id = adverts.id
                join files on files.id = file_id
                where title like '%" . $this->db->escape_like_str($searchEntry) . "%' limit $offset, $limit";
        return $this->db->query($sql)->result();
    }
}