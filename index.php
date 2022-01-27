<?php
require_once ('./others/utils.php');
require_once ('./controllers/Controller.php');
// Rechercher si il y a une info dans le get 
if (isset($_GET['action'])) {
    $action = filter_var($_GET['action'], FILTER_SANITIZE_EMAIL);
    // 
} else {
    $action = '';
}
pretty_print_r($action);
// ? permet de donner un parametre en GET / & permet de faire un autre get 
// TP-POO Avancee/source/?action=book&id=6

$page = $_GET['page'] ?? 'home';


if ($page === 'home') {
    $title = 'Home';
    render('page/index', compact('title'));
} 
else {
    $newUser = new Controller();
    // $method_name = $page;

    $page = explode('/', $page);
    
    // pretty_print_r($page);
    $method_name = $page[0];

    if(method_exists($newUser,$method_name)) {
        if ($method_name == "usergifs" || $method_name == "edit" || $method_name == "gifinfo" ) {
            $newUser->$method_name($page[1]);

        }else {
            $newUser->$method_name();
        }
    }else {
        // redirection vers la 404 


        $title = '404';
        render('page/404');
    }
}
// <a href="?action=author&id=<?= $author_id ">