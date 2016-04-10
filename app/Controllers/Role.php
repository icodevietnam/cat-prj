<?php

namespace App\Controllers;

use Core\View;
use Core\Controller;
use Helpers\Session;

class Role extends Controller {	

	public function __construct()
    {
        parent::__construct();
    }

    public function index(){
    	$data['title'] = 'Role Management';
    	View::renderTemplate('header', $data);
        View::render('Role/Role', $data);
        View::renderTemplate('footer', $data);
    }

    public function getAll(){
    	
    }

}