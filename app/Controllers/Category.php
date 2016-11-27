<?php

namespace App\Controllers;

use Core\View;
use Core\Controller;
use Helpers\Session;
use Helpers\Url;

class Category extends Controller {	

	private $categories;

	public function __construct()
    {
        parent::__construct();
        $this->categories = new \App\Models\Categories();
    }

    public function index(){
        if(Session::get('admin') == null){
            Url::redirect('admin/login');
        }
    	$data['title'] = 'Category Management';
        $data['menu'] = 'lession';
    	View::renderTemplate('header', $data);
        View::render('Category/Category', $data);
        View::renderTemplate('footer', $data);
    }

    public function getAll(){
    	echo json_encode($this->categories->getAll());
    }

    public function add(){
    	$name = $_POST['name'];
    	$description = $_POST['description'];
        $code  = $_POST['code'];
        $data = array('name' => $name,'description' => $description,'code' => $code);
    	echo json_encode($this->categories->add($data));
    }

    public function delete(){
    	$id = $_POST['itemId'];
    	echo json_encode($this->categories->delete($id));
    }

    public function get(){
    	$id = $_GET['itemId'];
    	echo json_encode($this->categories->get($id));
    }


    public function update(){
    	$id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $code  = $_POST['code'];
        $data = array('name' => $name,'description' => $description,'code' => $code);
    	$where = array('id' => $id);
    	echo json_encode($this->categories->update($data,$where));
    }

    public function checkCode(){
        $code = $_GET['code'];
        echo json_encode($this->categories->checkCode($code));
    }

}