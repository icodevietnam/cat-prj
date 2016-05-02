<?php

namespace App\Controllers;

use Core\View;
use Core\Controller;
use Helpers\Session;
use Helpers\Url;

class HomeAbout extends Controller {	

	public function __construct()
    {
        parent::__construct();
    }

    public function index(){
    	$data['title'] = 'Home';
        //$data['levels'] = $this->levels->getAll();
    	View::renderTemplate('header', $data,'home');
        View::render('Home/AboutUs', $data);
        View::renderTemplate('footer', $data,'home');
    }


}