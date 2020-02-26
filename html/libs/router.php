<?php
namespace MVC\Libs;

//use MVC\Controllers;

//разбор адресной строки...подключить необх файлы
class Router{
	//static можно запустить до создания obj
	public static function start(){
		$controllerName = 'home';
        $actionName = 'index';
		//$url = isset($_GET['url']) ? $_GET['url'] : 'home';// узнали что в адресной строке
		$url = $_SERVER['REQUEST_URI'];
		$url = explode('/', $url);// разбили на массив,где 
		/*
			/user/login ---- $url[0]=user $url[1]=login
			/user ---------- $url[0]=user
			/ -------------- $url[0]=home
		*/
		if ( !empty($url[1]) )
        {   
            $controllerName = $url[1];
        }
        
        // получаем имя action
        if ( !empty($url[2]) )
        {
            $actionName = $url[2];
        }
		//controllers/userController.php
		//require_once 'controllers/'.ucfirst($url[0]).'Controller.php'; // --- конкатенация где $url[0] это или user или home а далее Controller.php и вместе читаем userController.php или homeController.php
		
		$controllerFile = 'controllers/'.$controllerName.'Controller.php'; // строка в переменной 'controllers/homeController.php'

		if(file_exists($controllerFile)){ //если файл существует по этому по пути и с этим имененем, то его подключаем
			
			require_once $controllerFile;//его подключаем по пути в строке
			
						
			$contr ='MVC\\Controllers\\'. ucfirst($controllerName) .'Controller'; //Class HomeController на главной ; отдельно название Класса c Заглавной буквы

			
			$controller = new $contr(); //создание экз объекта, записывается new homeController, для поледующего вызова метода от его имени
			//$controller = new Controllers\HomeController();
			//$func = isset($url[1]) ? $url[1] : 'index';// если существует $url[1] то ее и запишем в переменную $func, а если нет то 'index'
			
			//проверка метода в данном классе и контроллера
			//method_exists(Экземпляр объекта или имя класса , Имя метода ) — Проверяет, существует ли метод в данном классе
			if(method_exists($controller, $actionName)){
				$controller->$actionName();//вызов метода от имени нового Объекта
			}
			else{
				echo "No method exist";
				//self::errorPage404();
			}
		}
		else{
			echo "No controller - [".$controllerFile."] exist";
			//self::errorPage404();// self:: т.к. статический метод 
		}

	}
	public static function errorPage404(){ 
		$host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:'.$host.'404');
		
		/*
		header('HTTP/1.1 404 Not Found');// отправка заголовка
		header('Status: 404 Not Found');
		header('Location: 404.html');
		*/
	}
}