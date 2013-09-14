<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category_Model extends CI_Model
{
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function getAll()
    {
    	return $this->db->get(CATEGORIES_TABLE)->result();
    }
}