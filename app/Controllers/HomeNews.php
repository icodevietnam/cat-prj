<?php

namespace App\Controllers;

use Core\View;
use Core\Controller;
use Helpers\Session;
use Helpers\Url;

class HomeNews extends Controller {	

    private $news;
    private $categories;

	public function __construct()
    {
        parent::__construct();
        $this->news = new \App\Models\News();
        $this->categories = new \App\Models\Categories();
    }

    public function news(){
    	$data['title'] = 'News';
        //$data['levels'] = $this->levels->getAll();
        $data['news'] = $this->news->getAllNews();
        $data['categories'] = $this->categories->getAll();
    	View::renderTemplate('header', $data,'Home');
        View::render('Home/News', $data);
        View::renderTemplate('footer', $data,'Home');
    }

    public function notifications(){
        $data['title'] = 'Notification';
        //$data['levels'] = $this->levels->getAll();
        $data['categories'] = $this->categories->getAll();
        $data['notifications'] = $this->news->getAllNotifications();
        View::renderTemplate('header', $data,'Home');
        View::render('Home/Notification', $data);
        View::renderTemplate('footer', $data,'Home');
    }


}