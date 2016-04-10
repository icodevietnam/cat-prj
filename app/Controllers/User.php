<?php
namespace App\Controllers;

use Core\View;
use Core\Controller;
use Helpers\Session;

class User extends Controller {	

	public function __construct()
    {
        parent::__construct();
    }

    public function index(){
    	$data['title'] = 'User Management';
    	View::renderTemplate('header', $data);
        View::render('User/User', $data);
        View::renderTemplate('footer', $data);
    }
}