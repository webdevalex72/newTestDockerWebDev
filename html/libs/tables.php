<?php
namespace MVC\Libs;

class Tables{
    //ПОМНИ! в классе наследнике "ручками" пишем теги  echo '<table>' и  echo '</table>';
    
    public $array;
    public $arrKeys;
    public function __construct($arr){
        $this->array = $arr;
        
    }
    public function getHeader(){
        //собрали заголовки в массив
        foreach($this->array as $key=>$value){
            $arrKeys = array_keys($value);//Array ( [0] => name [1] => age [2] => email ) 
        }
        return $this->arrKeys = $arrKeys;
       
    }
    public function createHeader(){  
        $arrKeys = $this->getHeader();
        echo '<thead>';
        echo '<tr class="bg-secondary text-light">';
        foreach($arrKeys as $value){
            echo '<th>'.$value.'</th>';
        }
        echo '</tr>';
        echo '</thead>';
    }
    public function createTBody(){ 
        echo '<tbody>';       
    
        foreach($this->array as $key=>$value){
        echo '<tr>';
            foreach($value as $k=>$v){
            echo '<td>'.$v.'</td>';
            }
        $this->createEndTBody($value);  
        }
        echo '</tbody>'; 
    }
    public function createEndTBody($value){
           
           
            //echo '<td></td>;// вставить если что то нужно еще
            echo '</tr>';
       
        
    }


}