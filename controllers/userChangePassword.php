<?php

require_once('../models/User.php');
require_once('../models/Link.php');
require_once('../models/Sanitize.php');
require_once('../others/utils.php');

// récupération des cookies et des post pour modifier
$usercookie = $_COOKIE['name'];
$password_last_post = $_POST['change_last_password'];
$password_new_post = $_POST['change_new_password'];

// Sanitize des nouveaux champs
$sanitaze_last_password = Sanitize::text($password_last_post);
$sanitaze_new_password = Sanitize::text($password_new_post);

// récupère l'objet et la méthode pour modifier le password
$newUser = new User(0, "", "", "");
$user_name_verif = $newUser->changePassword($usercookie);

//hash le nouveau password
$password_hash = password_hash($sanitaze_new_password, PASSWORD_BCRYPT);


// condition on verifie que le password match avec l'ancien et on modifie si c'est bon
if (password_verify($sanitaze_last_password, $user_name_verif['user_password'])) {
    $newUser->modifyPassword($password_hash, $_COOKIE['name']);
    
}
Link::redirectTo("/?page=edit/" . $usercookie);
