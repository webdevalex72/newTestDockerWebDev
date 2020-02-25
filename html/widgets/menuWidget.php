<?php
class MenuWidget{
    static function show(){
        $menu = new Menu();
        $items = $menu->getAll();
    
    ?>
    <!-- Grey with black text -->
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav mr-auto">
        <?php foreach($items as $item): ?>
            <li class="nav-item active">

            <a class="nav-link" href="<?= $item['path']?>"><?= $item['name']?></a>

            </li>
<?php endforeach; ?>
        </ul>
        
        <ul class="navbar-nav"> 
        <? if( !isset($_SESSION['user'])):?>
        <li class="nav-item active">

            <a class="nav-link" href="/user/login">LOGIN</a>

        </li>
        <li class="nav-item active">

            <a class="nav-link" href="/user/signup">SIGNUP</a>

        </li>
    <? else:?>
        <li class="nav-item active">

            <a class="nav-link" href="/user/login">SIGNOUT</a>

        </li>
        <? unset($_SESSION['user']);?>
    <? endif; ?>

        </ul>
        </nav>
    <?php
    
    
    }
}