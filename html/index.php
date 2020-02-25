<?php
	// require_once 'libs/router.php';
	// require_once 'libs/controller.php';
	// require_once 'libs/view.php';
	//session_start();


	//функция автоподключения файлов с классами  - spl_autoload_register - Регистрирует заданную функцию в качестве реализации метода __autoload()
	spl_autoload_register(function($class_name){
		$libsPath = 'libs/'.strtolower($class_name).'.php'; //Router
		$modelsPath = 'models/'.strtolower($class_name).'.php';
		$widgetsPath = 'widgets/'.strtolower($class_name).'.php';
		if(file_exists($libsPath)){
			require_once $libsPath;
		}
		if(file_exists($modelsPath)){
			require_once $modelsPath;
		}
		if(file_exists($widgetsPath)){
			require_once $widgetsPath;
		}
	});
	Session::start();
//Session::setMessage('success','Hello');
//Session::showMessage();
	Router::start(); //Обращение к стат свойствам происходит без создания нового класса! Обращаемся просто к имени класса  Router::   запускает весь проект через функцию start()