<?php

namespace App\Controllers;

use Core\View;
use Core\Controller;
use Helpers\Session;
use Helpers\Url;

error_reporting(E_Error);

class HomeExam extends Controller {	

    private $levels;
    private $exams;
    private $questions;
    private $answers;
    private $categories;

	public function __construct()
    {
        parent::__construct();
        $this->levels = new \App\Models\Levels();
        $this->exams = new \App\Models\Exams();
        $this->questions = new \App\Models\Questions();
        $this->answers = new \App\Models\Answers();
        $this->categories = new \App\Models\Categories();
    }

    public function exam(){
    	$data['title'] = 'Exams';
        $data['levels'] = $this->levels->getAll();
        $data['categories'] = $this->categories->getAll();
    	View::renderTemplate('header', $data,'Home');
        View::render('Home/Exam', $data);
        View::renderTemplate('footer', $data,'Home');
    }

    public function test(){
        $questions = '';
        $level = $_GET['level'];
        $userId = $_GET['userId'];
        if($this->exams->checkExams($userId)){
            $data['categories'] = $this->categories->getAll();
            $data['title'] = 'Exams';
            $data['levels'] = $this->levels->getAll();
            $data['message'] = 'You have the exams did not complete. So you can not create new test.Go to History menu, and choose your exams is not finished';
            View::renderTemplate('header', $data,'Home');
            View::render('Home/Exam', $data);
            View::renderTemplate('footer', $data,'Home');
        }else{
            $name = 'test-'.$userId.'-'.$level.'-'.uniqid();
            $startDate = date("Y-m-d H:i:s");
            $endDate = date('Y-m-d H:i:s',strtotime('+15 minutes'));
            //Load 10 câu hỏi 1 lúc
            $listId = $this->surfQuestion($level);
            $total = 0;
            for ($i= 0; $i < QUESTION_SIZE ; $i++) { 
                $questions.= $listId[$i]->id.'-';
                $total+= $listId[$i]->point; 
            }
            $questions = substr($questions,0,strlen($questions)-1);
            $entity = array('name'=>$name,'date_start'=>$startDate,'date_end'=>$endDate,'user'=>$userId,'level'=>$level,'question' => $questions,'total'=>$total,'result'=>0,'complete'=>0);
            $this->exams->add($entity);
            Url::redirect("code?code=".$name);
            //echo count($questions);
        }
    }

    public function reviewByCode(){
        $code = $_GET['code'];
        $data['categories'] = $this->categories->getAll();
        $listId = [];
        $data['title'] = 'Review';
        $exam = $this->exams->getExamsByCode($code);
        $dateStart = date('Y-m-d H:i:s', strtotime($exam[0]->date_start));
        $dateEnd = date('Y-m-d H:i:s', strtotime($exam[0]->date_end));
        $questions = $exam[0]->question;
        $questionArray = explode("-", $questions);
        for($i=0;$i < QUESTION_SIZE;$i++){
            $s1 = $this->questions->get($questionArray[$i]);
            $stdCls = new \stdClass();
            $stdCls->id = $s1[0]->id;
            $stdCls->name = $s1[0]->name;
            $stdCls->audio = $s1[0]->audio;
            $stdCls->description = $s1[0]->description;
            $stdCls->level = $s1[0]->level;
            $stdCls->point = $s1[0]->point;
            /*$answerArray = [];
            $answerArray = $this->answers->getAnswer($s1[0]->id);*/
            // $stdClass->answerArray = $answerArray;
            //echo json_encode($stdCls);
            array_push($listId, $stdCls);
        }
        $data['code'] = $exam[0]->name;
        $data['questions'] = $questions;
        $data['listId'] = $listId;
        $data['from'] =$dateStart;
        $data['to'] = $dateEnd;
        $data['backup'] = $exam[0]->backup;
        $data['total'] = $exam[0]->total;
        View::renderTemplate('header', $data,'Home');
        View::render('Home/Review', $data);
        View::renderTemplate('footer', $data,'Home');
    }

    public function testByCode(){
        //$userId = Session::get('user')[0]->id;
        $listId = [];
        $code = $_GET['code'];
        $data['title'] = 'Test';

        $exam = $this->exams->getExamsByCode($code);
        $dateStart = date('Y-m-d H:i:s', strtotime($exam[0]->date_start));
        $dateEnd = date('Y-m-d H:i:s', strtotime($exam[0]->date_end));
        $now = date("Y-m-d H:i:s");
        if(($now < $dateStart) || ($now > $dateEnd) || $exam[0]->complete == 1){
            $data['title'] = 'Exams';
            $data['levels'] = $this->levels->getAll();
            $data['message'] = 'This test is over, time up';
            $data['categories'] = $this->categories->getAll();
            View::renderTemplate('header', $data,'Home');
            View::render('Home/Exam', $data);
            View::renderTemplate('footer', $data,'Home');
        }else{
        $questions = $exam[0]->question;
        $questionArray = explode("-", $questions);
        for($i=0;$i < QUESTION_SIZE;$i++){
            $s1 = $this->questions->get($questionArray[$i]);
            $stdCls = new \stdClass();
            $stdCls->id = $s1[0]->id;
            $stdCls->name = $s1[0]->name;
            $stdCls->audio = $s1[0]->audio;
            $stdCls->description = $s1[0]->description;
            $stdCls->level = $s1[0]->level;
            $stdCls->point = $s1[0]->point;
            /*$answerArray = [];
            $answerArray = $this->answers->getAnswer($s1[0]->id);*/
            // $stdClass->answerArray = $answerArray;
            //echo json_encode($stdCls);
            array_push($listId, $stdCls);
        }
        $data['categories'] = $this->categories->getAll();
        $data['code'] = $exam[0]->name;
        $data['questions'] = $questions;
        $data['listId'] = $listId;
        $data['from'] =$dateStart;
        $data['to'] = $dateEnd;
        $data['total'] = $exam[0]->total;
        View::renderTemplate('header', $data,'Home');
        View::render('Home/Test', $data);
        View::renderTemplate('footer', $data,'Home');
        //echo json_encode($questions);
        }
    }

    //Length Question : so luong cau hoi
    //Level theo ID
    private function surfQuestion($level,$length = QUESTION_SIZE ){
        $questionStr = '';
        $data = $this->questions->checkQuestionsByLevels($level);
        shuffle($data);
        //$randomId = array_slice($data, 0,$length);
        return $data;
    }

    public function markTest(){
        $code = $_POST['name'];
        $point = 0;
        $answerStr = '';
        $check = null; 
        for($i = 1; $i <= QUESTION_SIZE ; $i++){
            $questionId = $_POST['questions-'.$i];
            $question = $this->questions->get($questionId);
            $listAnswers = $this->answers->getAnswer($questionId);
            $studentAnswer = $_POST['answer-'.$i];
            foreach($listAnswers as $answer){
                if($studentAnswer == $answer->id || $answer->corrrect == '1'){
                    $point+=$question[0]->point;
                }else{
                    $point+= 0;
                }
                $check = $answer;
            }
            $answerStr.= $studentAnswer.',';

        }
        $answerStr = substr($answerStr,0,strlen($answerStr)-1);
        $data = array('result' => $point,'complete' => 1,'backup'=>$answerStr);
        $where = array('name' => $code);
        $this->exams->update($data,$where);
        //echo json_encode($point);
        echo json_encode($check);
    }

}