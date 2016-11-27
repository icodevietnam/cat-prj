<?php

namespace App\Controllers;

use Core\View;
use Core\Controller;
use Helpers\Session;
use Helpers\Url;

class HomeHistory extends Controller {	

    private $exams;
    private $categories;

	public function __construct()
    {
        parent::__construct();
        $this->exams = new \App\Models\Exams();
        $this->categories = new \App\Models\Categories();
    }

    public function index(){
        $this->updateExams();
    	$data['title'] = 'History';
        $userId = Session::get('user')[0]->id;
        $listExams = $this->exams->getExamsById($userId);
        $data['listExams'] = $listExams;
        $data['categories'] = $this->categories->getAll();
    	View::renderTemplate('header', $data,'Home');
        View::render('Home/History', $data);
        View::renderTemplate('footer', $data,'Home');
    }

    public function updateExams(){
        $userId = Session::get('user')[0]->id;
        $listExams = $this->exams->getExamsById($userId);
        foreach ($listExams as $key => $value) {
            $id = $value->id;
            $dateStart = date('Y-m-d H:i:s', strtotime($value->date_start));
            $dateEnd = date('Y-m-d H:i:s', strtotime($value->date_end)); 
            $now = date("Y-m-d H:i:s");
            if(($now < $dateStart) || ($now > $dateEnd)){
                $data = array('complete'=> 1);
                $where = array('id'=>$id);
                $this->exams->update($data,$where);
            }
        }
    }


}