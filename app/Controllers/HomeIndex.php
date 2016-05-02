<?php

namespace App\Controllers;

use Core\View;
use Core\Controller;
use Helpers\Session;
use Helpers\Url;

class Dashboard extends Controller {	

	private $questions;
    private $levels;
    private $answer;

	public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        if(Session::get('admin') == null){
            Url::redirect('admin/login');
        }
    	$data['title'] = 'Dashboard';
        $data['menu'] = 'preference';
        //$data['levels'] = $this->levels->getAll();
    	View::renderTemplate('header', $data);
        View::render('AdminDashboard/Dashboard', $data);
        View::renderTemplate('footer', $data);
    }


}