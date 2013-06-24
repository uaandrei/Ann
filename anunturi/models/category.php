<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class category extends CI_Model
{
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function getAll()
    {
    	return $this->db->get('categories')->result();
    }
}