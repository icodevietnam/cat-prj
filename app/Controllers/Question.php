<?php

namespace App\Controllers;

use Core\View;
use Core\Controller;
use Helpers\Session;

class Question extends Controller {	

	private $questions;
    private $levels;
    private $answer;

	public function __construct()
    {
        parent::__construct();
        $this->questions = new \App\Models\Questions();
        $this->levels = new \App\Models\Levels();
        $this->answers = new \App\Models\Answers();
    }

    public function index(){
    	$data['title'] = 'Question & Answer Management';
        $data['menu'] = 'exam';
        $data['levels'] = $this->levels->getAll();
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
        $level  = $_POST['level'];
        $upload = new \Helpers\UploadCoded();
        $audio = $upload->upload('audio','audio',20480000);
        $fileName = $_FILES['audio']['name'];

        if("" === $fileName){
            $data = array('name' => $name,'description' => $description,'level' => $level,'audio' => 'Do not attach the audio file');
        }else{
            $data = array('name' => $name,'description' => $description,'level' => $level,'audio' => $audio);
        }
        echo json_encode($audio);
    	//echo json_encode($this->questions->add($data));
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