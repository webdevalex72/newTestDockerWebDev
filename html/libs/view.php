<?php
namespace MVC\Libs;

class View{
    static public function render($path, Array $data=[]){
        extract($data);//разбиваем / преобразует асс массив по переменным
        unset($data);// удалили переменную чтобы не висело в памяти
        require_once 'views/header.php';
        require_once 'views/'.$path.'.php'; // views/home/index.php
        require_once 'views/footer.php';
    }
}