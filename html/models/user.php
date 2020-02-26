<?php
namespace MVC\Models;

//описать методы запросов к БД в зависимости от действия пользователя
class User extends Model{
    function getAll(){
        $res = $this->connect->prepare('SELECT * FROM users ORDER BY id');
        $res->execute();
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }
    function save($email,$password,$name){
        $res = $this->connect->prepare('INSERT INTO users(email,password,name) VALUES(?,?,?)');
        $res->execute([$email,$password,$name]);
    }
    function checkUser($password,$name){
        $res= $this->connect->prepare('SELECT * FROM users WHERE password = ? AND name = ?');
        $res->execute([$password,$name]);
        return $res->fetch(PDO::FETCH_ASSOC);

    }
    function checkEmail($email){
        $res= $this->connect->prepare('SELECT * FROM users WHERE email = ? ');
        $res->execute([$email]);
        return $res->fetch(PDO::FETCH_ASSOC);
    }
}