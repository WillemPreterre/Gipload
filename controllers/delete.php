<!-- <?php 
require_once('../others/utils.php');


// extract($_GET);
// pretty_print_r($_GET);
// $user_id = $_GET["name"];

// // print_r_function($user_id);                

// // Si $_GET contient la clé user_id et qu'elle n'est pas vide
// if (isset($user_id) && !empty($user_id)) {

//     // On va chercher les détails dans la table users si ils existent
//     $user = $_COOKIE($user_id);
//     // Si la fonction get_user_detail trouve une correspondance avec $user_id
//     if ($_COOKIE($user_id) != false) {
//         // fonction avec dépense + revenu
//         // var_dump($user);

//         // Récupération des expenses en fonction de l'id
//         $expense = $_COOKIE($user_id);

//     }
// }
$title = 'Your profile';

render('page/user_edit', compact('title')); 