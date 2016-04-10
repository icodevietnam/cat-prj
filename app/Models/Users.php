<?php
namespace app\Models;

use Core\Model;

class Users extends Model
{
	
	function __construct()
	{	
		parent::__construct();
	}

	//Get All

	function getAll(){
		return $this->_db->select("SELECT * FROM ".PREFIX."roles order by id desc ");
	}

}