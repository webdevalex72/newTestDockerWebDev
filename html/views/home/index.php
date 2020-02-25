<!-- <h1 class="text-center">Главная страница</h1> -->
 <h1 class="text-center"><?= $title ?></h1>   <!-- перем  $title прилетела из extract($data) файла view php-->
<p class="text-center"><?= $text ?></p>
<?php Session::showMessage(); ?>