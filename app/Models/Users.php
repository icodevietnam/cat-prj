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

	public function getAll(){
		return $this->_db->select("SELECT * FROM ".PREFIX."users order by id desc ");
	}

	function add($data){
		try {
			$this->_db->insert(PREFIX.'users',$data);
			return json_encode(true);
		} catch (Exception $e) {
			json_encode(false);
		}
	}

}