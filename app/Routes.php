<?php

/** Create alias for Router. */
use Core\Router;
use Helpers\Hooks;

/** Get the Router instance. */
$router = Router::getInstance();

/** Define static routes. */

// Default Routing
Router::any('welcome', 'App\Controllers\Welcome@index');
Router::any('subpage', 'App\Controllers\Welcome@subPage');
Router::any('admin/user', 'App\Controllers\User@index');
Router::any('admin/role', 'App\Controllers\Role@index');
Router::any('admin/level', 'App\Controllers\Level@index');
Router::get('admin/notification', 'App\Controllers\Notification@index');
Router::get('admin/news', 'App\Controllers\Notification@index2');
Router::get('admin/question-answer', 'App\Controllers\Question@index');

//Login Admin
Router::get('admin/login', 'App\Controllers\Login@index');
Router::post('admin/login','App\Controllers\Login@loginAdmin');
Router::get('admin/logout','App\Controllers\Login@logOutAdmin');


//Role Admin Action
Router::get('role/getAll', 'App\Controllers\Role@getAll');
Router::post('role/add', 'App\Controllers\Role@add');
Router::post('role/delete', 'App\Controllers\Role@delete');
Router::get('role/get', 'App\Controllers\Role@get');
Router::post('role/update', 'App\Controllers\Role@update');

//User Admin Action
Router::get('user/getAll', 'App\Controllers\User@getAll');
Router::post('user/add', 'App\Controllers\User@add');
Router::post('user/delete', 'App\Controllers\User@delete');
Router::get('user/get', 'App\Controllers\User@get');
Router::post('user/update', 'App\Controllers\User@update');
Router::get('user/checkEmail','App\Controllers\User@checkEmailExist');
Router::get('user/checkUser','App\Controllers\User@checkUsernameExist');

//Level Admin Action
Router::get('level/getAll', 'App\Controllers\Level@getAll');
Router::post('level/add', 'App\Controllers\Level@add');
Router::post('level/delete', 'App\Controllers\Level@delete');
Router::get('level/get', 'App\Controllers\Level@get');
Router::post('level/update', 'App\Controllers\Level@update');

//Notification Admin Action
Router::get('notification/getAll', 'App\Controllers\Notification@getAll');
Router::post('notification/add', 'App\Controllers\Notification@addNotification');
Router::post('notification/delete', 'App\Controllers\Notification@delete');
Router::get('notification/get', 'App\Controllers\Notification@get');
Router::post('notification/update', 'App\Controllers\Notification@update');

//News Admin Action
Router::get('news/getAll', 'App\Controllers\Notification@getAllNews');
Router::post('news/delete', 'App\Controllers\Notification@delete');
Router::post('news/add', 'App\Controllers\Notification@addNews');
Router::post('news/update', 'App\Controllers\Notification@update');
Router::get('news/get', 'App\Controllers\Notification@get');

/** End default routes */

/** Module routes. */
$hooks = Hooks::get();
$hooks->run('routes');
/** End Module routes. */

/** If no route found. */
Router::error('Core\Error@index');

/** Execute matched routes. */
$router->dispatch();
