<?php
class MenuController extends Controller{
    function index(){
        $menu = new Menu();
        $itemsMenu = $menu->getAll();//обр к модели и вызв метод // сюда прилетает ассоциати массив из menu.php
        View::render('menu/index', compact('itemsMenu'));//compact — Создает массив, содержащий названия переменных и их значения
    }
    //для добавления страницы нужно создать новый метод add с именем в GET параметре

    function add(){
        if($_POST)
        {
            $name = isset($_POST['name']) ? $_POST['name']: '';
            $path = isset($_POST['path']) ? $_POST['path']: '';
            $order_menu = isset($_POST['order_menu']) ? $_POST['order_menu']: '';
            if(!empty($name) && !empty($path))
            {
                $menu = new Menu();
                $menu->save($name,$path,$order_menu);
                Session::setMessage('success', "Пункт $name сохранен!" ); // а вывод сообщения нужно вызвать на стр куда перенаправлен, см ниже стр Menu
                header('Location: /menu');
                exit;
            }else{
                Session::setMessage('danger', 'Введите все данные' );// вывод сообщения реализовать здесь же на стр Add
            }
        }

        $title = 'Добавление пункта меню';
        View::render('menu/add', compact('title'));
    }
    function delete(){
        $id = isset($_GET['id'])? $_GET['id'] : '';
        if(!empty($id))
        {
            $menu = new Menu();
            $menu->delete($id);
            Session::setMessage('success', "Пункт $id удален!" );
            header('Location: /menu');
            exit;
        }
        else
        {
            Session::setMessage('danger', "Пункт $id НЕ удален!" );
        }
    }
    function edit(){
        if($_POST){
            $name = isset($_POST['name']) ? $_POST['name']: '';
            $path = isset($_POST['path']) ? $_POST['path']: '';
            $order_menu = isset($_POST['order_menu']) ? $_POST['order_menu']: '';
            $id = isset($_POST['id']) ? $_POST['id']: '';
            if( !empty($name) && !empty($path) && !empty($id) )
            {
                $menu = new Menu();
                $menu->update($name,$path,$order_menu,$id);
                Session::setMessage('success', "Пункт $id обновлен!" );
                header('Location: /menu');
                exit;
            }
            else
            {
                Session::setMessage('danger', "Пункт $id НЕ обновлен!" );
            }
        }

        $title = 'Редактирование пункта';
        $id = isset($_GET['id'])? $_GET['id'] : '';
        if(!empty($id))
        {
            $menu = new Menu();
            $item = $menu->getById($id);
            View::render('menu/add', compact('title','item'));
        }
    }
    function changeOrder(){
        $menu = new Menu();
        $menu->updateOrder($_POST['item']); // здесь в $_POST['item'] - массив данных
    }
    function changeVisibility(){
        $id = $_POST['idMenu'];
        $vis = $_POST['visibleMenu'];
        
        $menu = new Menu();
        echo $menu->visibility($id,$vis);
    }
}