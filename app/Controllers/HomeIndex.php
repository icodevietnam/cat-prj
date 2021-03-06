<?php

namespace App\Controllers;

use Core\View;
use Core\Controller;
use Helpers\Session;
use Helpers\Url;

class HomeIndex extends Controller {	

    private $categories;

	public function __construct()
    {
        parent::__construct();
        $this->categories = new \App\Models\Categories();
    }

    public function index(){
    	$data['title'] = 'Home';
        $data['categories'] = $this->categories->getAll();
    	View::renderTemplate('header', $data,'Home');
        View::render('Home/Home', $data);
        View::renderTemplate('footer', $data,'Home');
    }


}