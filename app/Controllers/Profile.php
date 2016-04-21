<?php
namespace App\Controllers;

use Core\View;
use Core\Controller;
use Helpers\Session;
use Helpers\Url;


class Profile extends Controller {	

    private $users;

	public function __construct()
    {
        parent::__construct();
        $this->users = new \App\Models\Users();
    }

    public function profile(){
        if(Session::get('admin') == null){
            Url::redirect('admin/login');
        }
    	$data['title'] = 'Profile';
    	View::renderTemplate('header', $data);
        View::render('Profile/Profile', $data);
        View::renderTemplate('footer', $data);
    }

    public function changePassword(){
        if(Session::get('admin') == null){
            Url::redirect('admin/login');
        }
        $data['title'] = 'Change Password';
        View::renderTemplate('header', $data);
        View::render('Profile/ChangePassword', $data);
        View::renderTemplate('footer', $data);
    }

}