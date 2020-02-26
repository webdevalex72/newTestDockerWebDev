<?php
namespace MVC\Controllers;
use MVC\Libs\Controller;

class UserController extends Controller{
	public function index(){
		$title = 'All Users';
		$user = new User();
		$itemsUser = $user->getAll();
		
		View::render('user/index', compact('title','itemsUser'));
	}
	public function login(){
		
		$title = 'Login';
		
		if($_POST)
		{
			$password = isset($_POST['password']) ? $_POST['password']: '';
			$name = isset($_POST['name']) ? $_POST['name']: '';
			if(!empty($password) && !empty($name) ){
				$user = new User();
				$data = $user->checkUser($password,$name);
				if($data == false){
					Session::setMessage('danger', "Пользователь с таким $name не существует!" );
				}else{
					Session::set('user',$name);
					Session::setMessage('success', "Привет $name !" );
					header('Location: /home/index');
					exit;
				}
				
			}
		}
		

		View::render('user/login', compact('title')); // compact('title','text') 
	}
	public function signup(){
		//echo 'signup';
		$title = 'Signup';
		//$text = 'Форма';
		if($_POST)
		{
			//$email,$password,$passwordRPT,$name
			$email = isset($_POST['email']) ? $_POST['email']: '';
			$password = isset($_POST['password']) ? $_POST['password']: '';
			$passwordRPT = isset($_POST['password-rpt']) ? $_POST['password-rpt']: '';
			$name = isset($_POST['name']) ? $_POST['name']: '';
			if(!empty($email) && !empty($password) && !empty($name) && !empty($passwordRPT) && ($password===$passwordRPT) )
			{
				
				
				$user = new User();
				$itemUser = $user->checkEmail($email);
				if(!$itemUser){
					$user->save($email,$password,$name);
					Session::setMessage('success', "Пользватель $id добавлен!" );
					header('Location: /user/index');
					exit;
				}else{
					Session::setMessage('danger', "Пользователь с таким $email уже существует!" );
				}
				
			}
		}
		View::render('user/signup', compact('title')); 
	}
	function check(){
		//echo 'Принят: '.$_POST['email'];
		$user = new User();
		$res = $user->checkEmail($_POST['email']);
		print_r($res) ;
		exit;

	}
}