<?php
class Menu extends Model{
    
    function getAll(){
        $res = $this->connect->prepare('SELECT * FROM menu ORDER BY order_menu');
        $res->execute();
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }
    function save($name,$path,$order_menu){
        $res = $this->connect->prepare('INSERT INTO menu(name,path,order_menu) VALUES(?,?,?)');
        $res->execute([$name,$path,$order_menu]);
    }
    
    function delete($id){
       
        $del = $this->connect->prepare('DELETE FROM menu WHERE id=?');
        $del->execute([$id]);
    }
    function getById($id){
        $res= $this->connect->prepare('SELECT * FROM menu WHERE id = ?');
        $res->execute([$id]);
        return $res->fetch(PDO::FETCH_ASSOC);

    }
   function update($name,$path,$order_menu,$id){
        $upd = $this->connect->prepare('UPDATE menu SET name=?,path=?,order_menu=? WHERE id=?');
        $upd->execute([$name,$path,$order_menu,$id]);
   }
    function updateOrder($item){ // $item это массив из $item[0]=>12,$item[1]=>3, ..
        $sql = 'UPDATE menu SET order_menu=? WHERE id=?';
        $res = $this->connect->prepare($sql);
        for($i=0; $i<count($item); $i++){
            $res->execute([ $i, $item[$i] ]);
        }
    }
    function visibility($id,$vis){
        $sql = 'UPDATE menu SET visible=? WHERE id=?';
        $res = $this->connect->prepare($sql);
        $res->execute([ $vis,$id ]);
        return $res->rowCount(); // кол-во затронутых строк
    }
}
