<?php
	// require_once 'libs/router.php';
	// require_once 'libs/controller.php';
	// require_once 'libs/view.php';
	//session_start();

require_once('vendor/autoload.php');

use MVC\Libs\Session;
use MVC\Libs\Router;

/**
 * функция автоподключения файлов с классами  - spl_autoload_register
 * Регистрирует заданную функцию в качестве реализации метода __autoload()
 */
/*	
	spl_autoload_register(function($class_name){
		$libsPath = 'libs/'.strtolower($class_name).'.php'; //Router
		$modelsPath = 'models/'.strtolower($class_name).'.php';
		$widgetsPath = 'widgets/'.strtolower($class_name).'.php';
		$controllerPath = 'controllers/' . strtolower($class_name) . '.php';
		if(file_exists($libsPath)){
			require_once $libsPath;
		}
		if(file_exists($modelsPath)){
			require_once $modelsPath;
		}
		if(file_exists($widgetsPath)){
			require_once $widgetsPath;
		}
		if(file_exists($controllerPath)){
			require_once $controllerPath;
		}
	});
*/

	Session::start();


/**
 * For ckeck sessions available un-comment 2-lines below
 */

	Session::setMessage('success','Hello');
	Session::showMessage();

/*
$controllerName = 'home';
$actionName = 'index';

$url = $_SERVER['REQUEST_URI'];
$url = explode('/', $url);
print_r($url);
echo "<br />";
if ( !empty($url[1]) )
        {   
            $controllerName = $url[1];
        }
        
        // получаем имя action
        if ( !empty($url[2]) )
        {
            $actionName = $url[2];
		}
echo $controllerName."<br />";
echo $actionName."<br />";
*/
/*
echo $_SERVER['PATH_INFO'];
echo "<pre>";
var_export($_SERVER);
echo "<pre/>";
echo "<br />";
*/
// echo parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);


Router::start(); //Обращение к стат свойствам происходит без создания нового класса! Обращаемся просто к имени класса  Router::   запускает весь проект через функцию start()