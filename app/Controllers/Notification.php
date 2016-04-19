<?php

namespace App\Controllers;

use Core\View;
use Core\Controller;
use Helpers\Session;
use Helpers\Url;

class Notification extends Controller {	

	private $news;

	public function __construct()
    {
        parent::__construct();
        $this->news = new \App\Models\News();
    }

    public function index(){
    	$data['title'] = 'Notification Management';
        $data['menu'] = 'user';
    	View::renderTemplate('header', $data);
        View::render('Notification/Notification', $data);
        View::renderTemplate('footer', $data);
    }

    public function getAll(){
    	echo json_encode($this->news->getAllNotifications());
    }

    public function getAllNews(){
    	echo json_encode($this->news->getAllNews());
    }
}