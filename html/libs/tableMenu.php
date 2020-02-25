<?php
class TableMenu extends Tables{
    
    public function getHeader(){
        //собрали заголовки в массив
        foreach($this->array as $key=>$value){
            $arrKeys = array_keys($value);//Array ( [0] => name [1] => age [2] => email ) 
        }
        $arrKeys[]='Visible'; // добавил в массив заголовков еще пару заголовков
        $arrKeys[]='Edit';
        return $this->arrKeys = $arrKeys;
       
    }
    public function createEndTBody($value){
        
          if($value['visible']==1){
                $vis = 'text-success';
            }else $vis = '';   
           
           echo '<td><i class="propVisible fas fa-check '.$vis.'" data-id="'.$value['id'].'" data-visible="'.$value['visible'].'"></i></td>';
           echo '<td><a href="/menu/edit?id='.$value['id'].'"><i class="fas fa-edit fa-lg text-primary"></i></a><a href="/menu/delete?id='.$value['id'].'"><i class="fas fa-trash-alt fa-lg text-danger"></i></a></td>';
        echo '</tr>';
       
        
       
    }
}