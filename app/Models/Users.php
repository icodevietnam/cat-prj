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
		$data = $this->_db->select("SELECT * FROM ".PREFIX."users WHERE username = :username", array(':username' => $username));
		return $data[0]->password;
	}

}