<?php
class TableBooks extends Tables{
    public function createTBody(){ 
        echo '<tbody>';       
    
        foreach($this->array as $key=>$value){
        echo '<tr class="rowInp">';
            foreach($value as $k=>$v){
            echo '<td><input class="quickChange form-control" type="text" data-input-id="'.$value['id'].'" data-input-col="'.$k.'" value="'.$v.'" readonly="readonly"></td>';
            }
        $this->createEndTBody($value);  
        }
        echo '</tbody>'; 
    }
}