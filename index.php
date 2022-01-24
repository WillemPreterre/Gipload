<?php
// require './controllers/BookController.php';
// require './others/utils.php';
// //Rechercher si il y a une info dans le get 
// if (isset($_GET['action'])) {
//     $action = filter_var($_GET['action'], FILTER_SANITIZE_EMAIL);
//     // 
// } else {
//     $action = '';
// }
// pretty_print_r($action);
// // ? permet de donner un parametre en GET / & permet de faire un autre get 
// // TP-POO Avancee/source/?action=book&id=6

// $page = $_GET['page'] ?? 'home';


// if ($page === 'home') {

//     $controller = new BookController();

//     $controller->getBooks();
// } else {

//     $page = explode('/', $page);
//     $controller_name = $page[0] . 'Controller';
//     $method_name = $page[1];
//     $router = new $controller_name();
    // $router->$method_name();
// }