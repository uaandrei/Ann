<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Advert_Model extends MY_MODEL
{

    function __construct()
    {
        parent::__construct();
        $this->tableName = ADVERT_TABLE;
    }

    function getByCategoryId($categoryId, $limit, $offset)
    {
        $this->db->select('*');
        $this->db->from($this->tableName);
        $this->db->where('category_id', $categoryId);
        $this->db->limit($limit, $offset);
        $this->db->order_by('date', 'desc');
        return $this->db->get()->result();
    }

    function getByTitle($searchEntry, $limit, $offset)
    {
        $this->db->select('*');
        $this->db->from($this->tableName);
        $this->db->like('title', $searchEntry);
        $this->db->limit($limit, $offset);
        $this->db->order_by('date', 'asc');
        return $this->db->get()->result();
    }

    function getFirstPictureOfAdvert($advertId)
    {
        $this->db->select('*');
        $this->db->from('files');
        $this->db->join('advert_files', 'files.id = advert_files.file_id');
        $this->db->where('advert_id', $advertId);
        $this->db->like('filename', 'thumb');
        $this->db->limit(1, 0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $file = $query->row();
            return $file->filename;
        }
        return "";
    }
}