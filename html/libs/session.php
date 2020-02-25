<?php
class Session{
    static function start(){
        session_start(); // запускаем сессию
    }
    static function set($key,$value){
        $_SESSION[$key] = $value; // записываем  в сессию - ключ - значение
    }
    static function has($key){
        return isset($_SESSION[$key]); // проверка существования сессии по ключу, возвращ  =  true or false
    }
    static function get($key){
        return self::has($key)? $_SESSION[$key] : null; // обращение к стат методу в этом классе через self:: к has($key) и возвр ЗНАЧЕНИЕ  сессии по переданному ключу
    }
    static function delete($key){ 
        if(self::has($key)){
            unset($_SESSION[$key]); // удаление сессии по переданному ключу
        }
    
    }
    static function setMessage($type,$text){
        self::set('message', compact('type','text')); //создание сообщения для пользователя, на основе классов bootstrap; здесь обр к стат методу  self::set - созд сессия с именмем message и в нее записывается массив с переменными, где type - имя класса danger или success (BS4) и text  - сам текст сообщения для пользователя
    }
    static function showMessage(){ // метод кото выводит сообщ в нужном месте
        if(self::has('message')){
            echo '<div class="alert alert-'.self::get('message')['type'].' ">';
            echo '<p>'.self::get('message')['text'].'</p>';
            echo '</div>';
            self::delete('message'); // после вывода сообщ удалим ее
        }
    }
}

// ATT!!   Запуск сессии для всего Проекта в index.php в корне проекта ПОСЛЕ функции автоподключения файлов с классами  - spl_autoload_register и ПЕРЕД обращением к классу Router:: пишем Session::start(); 
//         Вывод сообщений для пользователя - вставить в нужном месте кода и на нужной стронице/учитывая редирект Session::showMessage(); предварительно записав в метод Session::setMessage() требуемое
