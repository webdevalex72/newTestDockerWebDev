<?php
namespace MVC\Controllers;

use MVC\Libs\Controller;
use MVC\Libs\View;

class HomeController extends Controller{
	/*
	public function __construct(){
		echo __CLASS__;//волшебные свтойства выводит название Класса в которм написана эта строка, увидели что объект создался
	}
	*/
	public function index(){
		//echo '<br/>home';
		$title = 'Home page';
		$text = 'some text';
		//View::render('home/index', ['title'=>$title, 'text'=>$text]); // на главной подкл header & footer
		View::render('home/index', compact('title','text')); // compact('title','text') возвр ассоциат массив где эти стр явля ключами а в значения записыв переменную с этим же названием
	}
}