<?php
class Breadcrumbs{
    static function show(){
        $menu = new Menu();
        $items = $menu->getAll();
    
?>
    <!-- Grey with black text -->
    
    <footer class="container-fluid fixed-bottom mx-0 px-0">
    <ul class="breadcrumb justify-content-center" style="margin:0px 0">
            <?php foreach($items as $item): ?>
                <li class="breadcrumb-item">
                    <a href="<?= $item['path']?>"><?= $item['name']?></a>
                </li>
    <?php endforeach; ?>
       
  
        <? if( !isset($_SESSION['user'])):?>
        <li class="breadcrumb-item">

            <a href="/user/login">LOGIN</a>

        </li>
        <li class="breadcrumb-item">

            <a href="/user/signup">SIGNUP</a>

        </li>
    <? else:?>
        <li class="breadcrumb-item">

            <a href="/user/login">SIGNOUT</a>

        </li>
        <? unset($_SESSION['user']);?>
    <? endif; ?>

        </ul>
        </nav>
        </footer>
    <?php
    }
}