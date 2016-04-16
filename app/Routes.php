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

//Level Admin Action
Router::get('level/getAll', 'App\Controllers\Level@getAll');
Router::post('level/add', 'App\Controllers\Level@add');
Router::post('level/delete', 'App\Controllers\Level@delete');
Router::get('level/get', 'App\Controllers\Level@get');
Router::post('level/update', 'App\Controllers\Level@update');

/** End default routes */

/** Module routes. */
$hooks = Hooks::get();
$hooks->run('routes');
/** End Module routes. */

/** If no route found. */
Router::error('Core\Error@index');

/** Execute matched routes. */
$router->dispatch();
