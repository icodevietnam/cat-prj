<?php

namespace App;

use Helpers\Session;

/**
 * Configuration constants and options.
 */
class Config
{
    /**
     * Executed as soon as the framework runs.
     */
    public function __construct()
    {
        /**
         * Turn on output buffering.
         */
        ob_start();

        /**
         * Define the complete site URL.
         */
        define('SITEURL', 'http://localhost/cat-prj/');

        /**
         * Define relative base path.
         */
        define('DIR', '/cat-prj/');

        /**
         * Set the Application Router.
         */
        // Default Routing
        define('APPROUTER', '\Core\Router');
        // Classic Routing
        // define('APPROUTER', '\Core\ClassicRouter');

        /**
         * Set default controller and method for legacy calls.
         */
        define('DEFAULT_CONTROLLER', 'Welcome');
        define('DEFAULT_METHOD', 'index');

        /**
         * Set the default template.
         */
        define('TEMPLATE', 'Default');

        /**
         * Set the default number of question.
         */
        define('QUESTION_SIZE', 7);

        /**
         * Set the default template.
         */
        define('LOGIN', 'Login');

        /**
         * Set the default template.
         */
        define('HOME', 'Home');


        /**
         * Set a default language.
         */
        define('LANGUAGE_CODE', 'En');

        //database details ONLY NEEDED IF USING A DATABASE

        /**
         * Database engine default is mysql.
         */
        define('DB_TYPE', 'mysql');

        /**
         * Database host default is localhost.
         */
        define('DB_HOST', 'localhost');

        /**
         * Database name.
         */
        define('DB_NAME', 'catprj');

        /**
         * Database username.
         */
        define('DB_USER', 'root');

        /**
         * Database password.
         */
        define('DB_PASS', '');

        /**
         * PREFER to be used in database calls default is smvc_
         */
        define('PREFIX', 'prj_');

        /**
         * Set prefix for sessions.
         */
        define('SESSION_PREFIX', 'prj_');

        /**
         * Optional create a constant for the name of the site.
         */
        define('SITETITLE', 'Icode Based On Nova FW');


        /**
         * Define upload image size   
         */
        define('SIZEIMAGE', 2048000000);


        define('FILE_PATH', 'assets/file/');


        /**
         * Optionall set a site email address.
         */
        // define('SITEEMAIL', 'email@domain.com');

        /**
         * Turn on custom error handling.
         */
        set_exception_handler('Core\Logger::ExceptionHandler');
        set_error_handler('Core\Logger::ErrorHandler');

        /**
         * Set timezone.
         */
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        /**
         * Start sessions.
         */
        Session::init();
    }
}
