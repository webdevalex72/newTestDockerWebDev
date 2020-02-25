<?php
class BooksController extends Controller{
    function index(){
        $books = new Books();
        $itemsBooks = $books->getBooksLimit();//обр к модели и вызв метод // сюда прилетает ассоциати массив из books.php
        View::render('books/index', compact('itemsBooks'));//compact — Создает массив, содержащий названия переменных и их значения
    }
    function getNextBooks(){
        $books = new Books();
        $booksList = $books->getNextBooks($_POST['p']);
        //print_r($booksList);
        echo json_encode($booksList);//преобразует масcив в строку формата json ? это то что вернется в скрипт!
       
    }
    function updateBooks(){
        $books = new Books();
        $upd = $books->updateBooks($_POST['col'],$_POST['val'],$_POST['id']);
    }
}