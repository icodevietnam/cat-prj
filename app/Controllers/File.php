<?php

namespace App\Controllers;

use Core\View;
use Core\Controller;
use Helpers\Session;
use Helpers\Url;

class File extends Controller {	


	public function __construct()
    {
        parent::__construct();
    }

    public function checkImage(){
        $upload = new \Helpers\Upload();
        $message = $upload->checkImage($_FILES['image']);
        echo json_encode($message);
    }

    public function checkDocument(){
        $upload = new \Helpers\Upload();
        $message = $upload->checkDocument($_FILES['file']);
        echo json_encode($message);
    }

    public function checkAvatar(){
        $upload = new \Helpers\Upload();
        $message = $upload->checkImage($_FILES['avatar']);
        echo json_encode($message);
    }

}