<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category_Model extends MY_MODEL
{
	function __construct()
	{
		parent::__construct();
		$this->tableName = CATEGORIES_TABLE;
	}
}