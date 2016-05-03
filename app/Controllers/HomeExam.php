<?php

namespace App\Controllers;

use Core\View;
use Core\Controller;
use Helpers\Session;
use Helpers\Url;

class HomeExam extends Controller {	

    private $levels;

	public function __construct()
    {
        parent::__construct();
        $this->levels = new \App\Models\Levels();
    }

    public function exam(){
    	$data['title'] = 'Exams';
        $data['levels'] = $this->levels->getAll();
    	View::renderTemplate('header', $data,'home');
        View::render('Home/Exam', $data);
        View::renderTemplate('footer', $data,'home');
    }

}