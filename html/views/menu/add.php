
<div class="container shadow p-4 mb-4 mt-4 bg-light w-25">
<h1><?= $title ?></h1>
<?php Session::showMessage(); ?>
<?php //print_r($item); ?>
<form action="<?= isset($item)?'/menu/edit/':'/menu/add' ?>" method="post">
    <div class="form-group">
    <label for="">Название:</label>
    <input type="text" class="form-control" name="name" value="<?= isset($item)?$item['name']:'' ?>">
    </div>

    <div class="form-group">
    <label for="">Путь:</label>
    <input type="text" class="form-control" name="path" value="<?= isset($item)?$item['path']:'' ?>">
    </div>

    <div class="form-group">
    <label for="">Порядок:</label>
    <input type="text" class="form-control" name="order_menu" value="<?= isset($item)?$item['order_menu']:'' ?>">
    </div>
    <input type="hidden"  name="id" value="<?= isset($item)?$item['id']:'' ?>">
    <button type="submit" class="w-100">Добавить</button>
</form>
</div>