<?php
class Books extends Model{
    function getBooksLimit(){
        $res = $this->connect->prepare('SELECT id, name,price,category FROM books LIMIT 50');
        $res->execute();
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }
    function getNextBooks($p){
        $res = $this->connect->prepare('SELECT id, name,price,category FROM books LIMIT '.($p*50).', 50');
        $res->execute();
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }
    function updateBooks($colName, $val, $id){
        //$res = $this->connect->prepare('UPDATE books SET ?=? WHERE id=?');
        $res = $this->connect->prepare('UPDATE books SET '.$colName.'="'.$val.'" WHERE id='.$id.' ');
        //$res->execute([$colName, $val, $id]);
        $res->execute();
        
        //echo $colName.'</br>';
        //echo $val;
        //echo $id.'</br>';
        
        $count =  $res->rowCount();
        echo($count);
       
    }
}
