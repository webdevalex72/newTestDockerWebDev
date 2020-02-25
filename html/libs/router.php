<?php
//разбор адресной строки...подключить необх файлы
class Router{
	//static можно запустить до создания obj
	public static function start(){
		$url = isset($_GET['url']) ? $_GET['url'] : 'home';// узнали что в адресной строке
		$url = explode('/', $url);// разбили на массив,где 
		/*
			/user/login ---- $url[0]=user $url[1]=login
			/user ---------- $url[0]=user
			/ -------------- $url[0]=home
		*/
		
		//controllers/userController.php
		//require_once 'controllers/'.$url[0].'Controller.php'; // --- конкатенация где $url[0] это или user или home а далее Controller.php и вместе читаем userController.php или homeController.php
		
		$controllerName = 'controllers/'.$url[0].'Controller.php'; // строка в переменной
		if(file_exists($controllerName)){ //если файл существует по этому по пути и с этим имененем, то его подключаем
			require_once $controllerName;//его подключаем по пути в строке
			$contr = $url[0].'Controller'; //homeController на главной ; отдельно название Класса
			$controller = new $contr(); //создание экз объекта, записывается new homeController, для поледующего вызова метода от его имени
			
			$func = isset($url[1]) ? $url[1] : 'index';// если существует $url[1] то ее и запишем в переменную $func, а если нет то 'index'
			
			//проверка метода в данном классе и контроллера
			//method_exists(Экземпляр объекта или имя класса , Имя метода ) — Проверяет, существует ли метод в данном классе
			if(method_exists($controller, $func)){
				$controller->$func();//вызов метода от имени нового Объекта
			}
			else{
				self::errorPage404();
			}
		}
		else{
			self::errorPage404();// self:: т.к. статический метод 
		}
	}
	public static function errorPage404(){ 
		header('HTTP/1.1 404 Not Found');// отправка заголовка
		header('Status: 404 Not Found');
		header('Location: 404.html');
	}
}