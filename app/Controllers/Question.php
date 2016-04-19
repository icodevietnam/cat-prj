<?php

namespace App\Controllers;

use Core\View;
use Core\Controller;
use Helpers\Session;

class Question extends Controller {	

	private $questions;

	public function __construct()
    {
        parent::__construct();
        $this->questions = new \App\Models\Questions();
    }

    public function index(){
    	$data['title'] = 'Question Management';
        $data['menu'] = 'exam';
    	View::renderTemplate('header', $data);
        View::render('Question/Question', $data);
        View::renderTemplate('footer', $data);
    }

    public function getAll(){
    	echo json_encode($this->questions->getAll());
    }

    public function add(){
    	$name = $_POST['name'];
    	$description = $_POST['description'];

    	$data = array('name' => $name,'description' => $description );

    	echo json_encode($this->questions->add($data));
    }

    public function delete(){
    	$id = $_POST['itemId'];
    	echo json_encode($this->questions->delete($id));
    }

    public function get(){
    	$id = $_GET['itemId'];
    	echo json_encode($this->questions->get($id));
    }


    public function update(){
    	$name = $_POST['name'];
    	$description = $_POST['description'];
    	$id = $_POST['id'];

    	$data = array('name' => $name,'description' => $description );
    	$where = array('id' => $id);

    	echo json_encode($this->questions->update($data,$where));
    }

}