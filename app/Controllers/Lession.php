<?php

namespace App\Controllers;

use Core\View;
use Core\Controller;
use Helpers\Session;
use Helpers\Url;

class Lession extends Controller {	

	private $lessions;
    private $levels;
    private $categories;

	public function __construct()
    {
        parent::__construct();
        $this->lessions = new \App\Models\Lessions();
        $this->categories = new \App\Models\Categories();
        $this->levels = new \App\Models\Levels();
    }

    public function index(){
        if(Session::get('admin') == null){
            Url::redirect('admin/login');
        }
    	$data['title'] = 'Lession Management';
        $data['menu'] = 'lession';
        $data['levels'] = $this->levels->getAll();
        $data['categories'] = $this->categories->getAll();
    	View::renderTemplate('header', $data);
        View::render('Lession/Lession', $data);
        View::renderTemplate('footer', $data);
    }

    public function getAll(){
    	echo json_encode($this->lessions->getAll());
    }

    public function add(){
    	$title = $_POST['title'];
    	$description = $_POST['description'];
        $content  = $_POST['content'];
        $upload = new \Helpers\Upload();
        $image = $upload->uploadFile($_FILES['image']);
        $video =str_replace('https://www.youtube.com/watch?v=', 'https://www.youtube.com/v/',$_POST['video']);
        $category = $_POST['category'];
        $data = array('title'=>$title,'description'=>$description,'content'=>$content,'img'=>$image['path'],'video'=>$video,'category'=>$category);
    	echo json_encode($this->lessions->add($data));
    }

    public function delete(){
    	$id = $_POST['itemId'];
    	echo json_encode($this->lessions->delete($id));
    }

    public function get(){
    	$id = $_GET['itemId'];
    	echo json_encode($this->lessions->get($id));
    }


    public function update(){
    	$id = $_POST['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $content  = $_POST['content'];
        $category = $_POST['category'];
        $upload = new \Helpers\Upload();
        $image = $upload->uploadFile($_FILES['image']);
        $video =str_replace('https://www.youtube.com/watch?v=', 'https://www.youtube.com/v/',$_POST['video']);
        $data = array('title'=>$title,'description'=>$description,'content'=>$content,'img'=>$image['path'],'video'=>$video,'category'=>$category);
    	$where = array('id' => $id);

    	echo json_encode($this->lessions->update($data,$where));
    }

}