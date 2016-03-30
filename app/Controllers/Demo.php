<?php
namespace App\Controllers;

use Core\View;
use Core\Controller;
use Helpers\Url;

class Demo extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        echo 'hello';
    }

    public function test($param1 = '', $param2 = '', $param3 = '', $param4 = '')
    {
        $params = array(
            'param1' => $param1,
            'param2' => $param2,
            'param3' => $param3,
            'param4' => $param4
        );
        echo '<pre>';
        print_r($params);
        echo '</pre>';
    }
}
