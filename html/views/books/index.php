<div class="container">
    <?php
    
       $table = new TableBooks($itemsBooks);
        echo '<table id="books50">';
        echo '<colgroup>';
        echo '<col width="100px">';
        echo '<col width="auto">';
        echo '<col width="150px">';
        echo '<col width="300px">';
        echo '</colgroup>';
        $table->createHeader();
        $table->createTBody();
       
        echo '</table>';
    ?>
</div>
<div class="popup reg_form">
    
    <div class="test">
<a href="#" id="closeINP"><i class="far fa-window-close"></i></a>
<a href="#" id="saveINP"><i class="far fa-save"></i></a>
    </div>
</div>
<a href="#books50" class="scrollto" id="btn_up"><i class="fas fa-caret-square-up fa-3x"></i></a>
