<?php

namespace App\Controllers;

use Core\View;
use Core\Controller;
use Helpers\Session;
use Helpers\Url;

class HomeExam extends Controller {	

    private $levels;
    private $exams;
    private $questions;

	public function __construct()
    {
        parent::__construct();
        $this->levels = new \App\Models\Levels();
        $this->exams = new \App\Models\Exams();
        $this->questions = new \App\Models\Questions();
    }

    public function exam(){
    	$data['title'] = 'Exams';
        $data['levels'] = $this->levels->getAll();
    	View::renderTemplate('header', $data,'home');
        View::render('Home/Exam', $data);
        View::renderTemplate('footer', $data,'home');
    }

    public function test(){
        $questions = '';
        $level = $_GET['level'];
        $userId = $_GET['userId'];
        if($this->exams->checkExams($userId)){
            $data['title'] = 'Exams';
            $data['levels'] = $this->levels->getAll();
            $data['message'] = 'You have the exams did not complete. So you can not create new test.Go to examinations button, and choose your exams is not finished';
            View::renderTemplate('header', $data,'home');
            View::render('Home/Exam', $data);
            View::renderTemplate('footer', $data,'home');
        }else{
            $name = 'test-'.$userId.'-'.$level.'-'.uniqid();
            $startDate = date("Y-m-d H:i:s");
            $endDate = date('Y-m-d H:i:s',strtotime('+15 minutes'));
            //Load 10 câu hỏi 1 lúc
            $listId = $this->surfQuestion($level,7);
            $total = 0;
            for ($i=count($listId)- 1; $i >=0 ; $i--) { 
                $questions .= $listId[$i]->id.'-';
                $total+= $listId[$i]->point; 
            }
            $questions = substr($questions,0,strlen($questions)-1);

            $entity = array('name'=>$name,'date_start'=>$startDate,'date_end'=>$endDate,'user'=>$userId,'level'=>$level,'question' => $questions,'total'=>$total,'result'=>0,'complete'=>0);
            $this->exams->add($entity);

            $data['title'] = 'Test';
            $data['questions'] = $questions;
            $data['listId'] = $listId;
            $data['from'] = $startDate;
            $data['to'] = $endDate;
            $data['total'] = $total;
            View::renderTemplate('header', $data,'home');
            View::render('Home/Test', $data);
            View::renderTemplate('footer', $data,'home');
        }
    }

    public function testByCode(){
        //$userId = Session::get('user')[0]->id;
        $listId = [];
        $code = $_GET['code'];
        $data['title'] = 'Test';
        $exam = $this->exams->getExamsByCode($code);
        $questions = $exam[0]->question;
        $questionArray = explode("-", $questions);
        for($i=0;$i < count($questionArray);$i++){
            $s1 = $this->questions->get($questionArray[$i]);
            /*$arrayS1 = array('id'=>$s1[0]->id,'name'=>$s1[0]->name,'audio'=>$s1[0]->audio,'description'=>$s1[0]->description,'level'=>$s1[0]->level,'point'=>$s1[0]->point);*/
            $stdCls = new \stdClass();
            $stdCls->id = $s1[0]->id;
            $stdCls->name = $s1[0]->name;
            $stdCls->audio = $s1[0]->audio;
            $stdCls->description = $s1[0]->description;
            $stdCls->level = $s1[0]->level;
            $stdCls->point = $s1[0]->point;
            //echo json_encode($stdCls);
            array_push($listId, $stdCls);
        }
        $data['questions'] = $questions;
        $data['listId'] = $listId;
        $data['from'] = $exam[0]->date_start;
        $data['to'] = $exam[0]->date_end;
        $data['total'] = $exam[0]->total;
        View::renderTemplate('header', $data,'home');
        View::render('Home/Test2', $data);
        View::renderTemplate('footer', $data,'home');
    }

    //Length Question : so luong cau hoi
    //Level theo ID
    private function surfQuestion($level,$length){
        $questionStr = '';
        $data = $this->questions->checkQuestionsByLevels($level);
        shuffle($data);
        $randomId = array_slice($data, 0,$length);
        return $randomId;
    }

}