<?php
require_once('../others/utils.php');
require_once('../models/User.php');
require_once('../models/Sanitize.php');

if (!isset($_COOKIE)) {
    setcookie("name", null, time() + (86400 * 90), "/"); // 86400 = 1 day 

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    extract($_POST);
    $user_post = $_POST['username'];
    $password_post = $_POST['password'];

    //Sanitize
    $sanitaze_username = Sanitize::text($user_post);
    $sanitaze_password = Sanitize::text($password_post);

    if (
        isset($user_post) && !empty($user_post) &&
        isset($password_post) && !empty($password_post)
    ) {


        // vérification username


        // Condition pour connection
        if (
            isset($sanitaze_username) && !empty($sanitaze_username) &&
            isset($sanitaze_password) && !empty($sanitaze_password)
        ) {
            //initialisation des variables pour les cookies
            $connection = new User(0, '', '', '');
            $user_name_verif = $connection->connection($sanitaze_username);
            // condition pour vérif si erreur dans les champs et pour set le cookie
            if (password_verify($password_post, $user_name_verif['user_password'])) {



                setcookie("name", $user_name_verif['user_id'], time() + (86400 * 90), "/"); // 86400 = 1 day 
                echo ("Connection");
            } else {
                echo ('id or password incorrect');
            }
        } else {
            echo 'Remplir les champs';
        }
    }
}

$title = 'Connection';

render('page/Connection', compact('title'));
// render('default', compact('cookie_name','cookie_value'));

// Enlevé le msg quand mauvais 
//Bug il faut appuyer deux fois pour connection 