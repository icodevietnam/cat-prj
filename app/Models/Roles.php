<?php
namespace app\Models;

use Core\Model;

class Roles extends Model
{
	
	function __construct()
	{	
		parent::__construct();
	}

	function getAll(){
		return json_encode($this->_db->select("SELECT * FROM ".PREFIX."roles order by id desc "));
	}
}