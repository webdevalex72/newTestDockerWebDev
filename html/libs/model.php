<?php
namespace MVC\Libs;

class Model{
    protected $connect;
    function __construct(){
        $dsn = 'mysql:host=localhost;dbname=mvc;charset=utf8';
        $this->connect = new PDO ($dsn, 'root','');
    }
}