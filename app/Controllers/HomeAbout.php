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
        $this->categories = new \App\Models\Categories();
    }

    public function index(){
    	$data['title'] = 'AboutUs';
        //$data['levels'] = $this->levels->getAll();
        $data['categories'] = $this->categories->getAll();
    	View::renderTemplate('header', $data,'Home');
        View::render('Home/AboutUs', $data);
        View::renderTemplate('footer', $data,'Home');
    }


}