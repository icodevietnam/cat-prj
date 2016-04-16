<?php
namespace App\Controllers;

use Core\View;
use Core\Controller;
use Helpers\Session;

class User extends Controller {	

    private $users;

	public function __construct()
    {
        parent::__construct();
        $this->users = new \App\Models\Users();
    }

    public function index(){
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
        // $username = $_POST['username'];
        // $password = $_POST['password'];
        // $fullName = $_POST['fullName'];
        // $birthDate = $_POST['birthDate'];
        // $email = $_POST['email'];
        // $avatar = $_FILES['avatar'];

        $upload = new \Helpers\UploadCoded();

        /*$data = array('name' => $name,'description' => $description );*/

        /*echo json_encode($this->users->add($data));*/
        echo $upload->upload('avatar');

        //echo json_encode($_FILES['avatar']);
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
        $name = $_POST['name'];
        $description = $_POST['description'];
        $id = $_POST['id'];

        $data = array('name' => $name,'description' => $description );
        $where = array('id' => $id);

        echo json_encode($this->users->update($data,$where));
    }
}