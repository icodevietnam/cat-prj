<?php
namespace App\Controllers;

use Core\View;
use Core\Controller;
use Helpers\Session;
use Helpers\Url;

class User extends Controller {	

    private $users;

	public function __construct()
    {
        parent::__construct();
        $this->users = new \App\Models\Users();
    }

    public function index(){
        if(Session::get('admin') == null){
            Url::redirect('admin/login');
        }
    	$data['title'] = 'User Management';
        $data['menu'] = 'user';
    	View::renderTemplate('header', $data);
        View::render('User/User', $data);
        View::renderTemplate('footer', $data);
    }

    public function getAll(){
        echo json_encode($this->users->getAll());
    }

    public function add(){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $fullName = $_POST['fullName'];
        $birthDate = $_POST['birthDate'];
        $email = $_POST['email'];
        $upload = new \Helpers\UploadCoded();
        $avatar = $upload->upload('avatar','image');
        $birthDate = date('Y-m-d',strtotime($birthDate));
        $fileName = $_FILES['avatar']['name'];

        if("" === $fileName){
            $data = array('username' => $username, 'password' => md5($password) ,'fullname' => $fullName,'birthdate' => $birthDate,'email' => $email,'avatar' => 'http://localhost/cat-prj/assets/images/default.png');
        }else{
            $data = array('username' => $username, 'password' => md5($password) ,'fullname' => $fullName,'birthdate' => $birthDate,'email' => $email,'avatar' => $avatar );
        }
        echo json_encode($this->users->add($data));
    }

    public function delete(){
        $id = $_POST['itemId'];
        echo json_encode($this->users->delete($id));
    }

    public function get(){
        $id = $_GET['itemId'];
        echo json_encode($this->users->get($id));
    }


    public function update(){
        $id = $_POST['id'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $fullName = $_POST['fullName'];
        $birthDate = $_POST['birthDate'];
        $email = $_POST['email'];
        $upload = new \Helpers\UploadCoded();
        $avatar = $upload->upload('avatar','image');
        $birthDate = date('Y-m-d',strtotime($birthDate));
        $fileName = $_FILES['avatar']['name'];
        if("" === $fileName){
            $data = array('username' => $username, 'password' => md5($password) ,'fullname' => $fullName,'birthdate' => $birthDate,'email' => $email);
        }else{
            $data = array('username' => $username, 'password' => md5($password) ,'fullname' => $fullName,'birthdate' => $birthDate,'email' => $email,'avatar' => $avatar );
        }

        $where = array('id' => $id);

        echo json_encode($this->users->update($data,$where));
    }

    public function checkEmailExist(){
        $email = $_GET['email'];
        echo json_encode($this->users->checkEmail($email));
    }


    public function checkUsernameExist(){
        $username = $_GET['username'];
        echo json_encode($this->users->checkUsername($username));
    }
}