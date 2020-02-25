<?php //echo '<pre>'.print_r($updItem, true).'</pre>'?>
<?php //echo gettype($addItemMenu);?> <!--проверка подключения и вывод массива -->

<div class="container shadow p-4 mb-4 mt-4 bg-light w-50">
<h1 class="text-center text-info">Управление меню</h1>
<?php Session::showMessage(); ?>
<a href="/menu/add" class="btn btn-primary mb-2 mt-2">Add Item Menu</a>

<table class="table" >
    <thead>
        <tr class="table-secondary text-dark">
            <th>#</th>
            <th>Name</th>
            <th>Path</th>
            <th>Order</th>
            <th>Visible</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody id="sortable">
        <?php for($i=0; $i<count($itemsMenu); $i++): ?>
        <tr id="item-<?= $itemsMenu[$i]['id']?>">
            <td><?= $i+1; ?></td>
            <td><?= $itemsMenu[$i]['name'] ?></td>
            <td><?= $itemsMenu[$i]['path'] ?></td>
            <td><?= $itemsMenu[$i]['order_menu'] ?></td>
            <td><i class="propVisible fas fa-check <?= $itemsMenu[$i]['visible']==1? 'text-success': ''; ?>" data-id="<?=$itemsMenu[$i]['id'] ?>" data-visible="<?=$itemsMenu[$i]['visible']?>"></i></td>
            <td>
                <a href="/menu/edit?id=<?= $itemsMenu[$i]['id'] ?>">
                    <i class="fas fa-edit fa-lg text-primary"></i>
                </a>
                <a href="/menu/delete?id=<?= $itemsMenu[$i]['id'] ?>">
                    <i class="fas fa-trash-alt fa-lg text-danger"></i>
                </a>
            </td>
        </tr>
        <?php endfor;?>
    </tbody>
</table>
</div>

<!-- <div class="container"> -->
    <!-- <?php
        $tableMenu = new TableMenu($itemsMenu);
        echo '<table class="table" id="menuTable">';
        $tableMenu->createHeader();
        $tableMenu->createTBody();
        
        echo '</table>';
    ?> -->
<!-- </div> -->






