<?php
require_once('../others/utils.php');
require_once('../models/User.php');
require_once('../models/Sanitize.php');
require_once('../models/Link.php');

// mettre en classe
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     //Extract all the name in the form can use it to take the data from form
//     extract($_POST);
//     // print_r($_POST);
//     pretty_print_r($_COOKIE);
//     // Get all the data and put it on a var
//     $username = $_POST["username"];
//     $email = $_POST["email"];
//     $password = $_POST["password"];
//     $validate_password = $_POST["validate_password"];

//     //Sanitize
//     $sanitize_email = Sanitize::email($email);
//     $sanitize_username = Sanitize::text($username);
//     $sanitize_password = Sanitize::text($password);

//     //Patern pour trier et message d'erreur
//     $uppercase = "AZERTYUIOPQSDFGHJKLMWXCVBN";
//     $lowercase = "azertyuiopqsdfghjklmwxcvbn";
//     $number = "1234567890";
//     $password_hash = password_hash($sanitize_password, PASSWORD_BCRYPT);

//     //Condition Password  + email + username

//     if (filter_var($sanitize_email, FILTER_VALIDATE_EMAIL) == true) {
//         if (isset($sanitize_email, $sanitize_username) && strlen($sanitize_username) >= 3) {
//             if ($password == $validate_password) {
//                 switch ($password) {
//                     case strpbrk($password, $uppercase) == NULL:
//                         $password_message = "Need one UpperCase";
//                         break;
//                     case strpbrk($password, $number) == NULL:
//                         $password_message = "Need one number";
//                         break;
//                     case strpbrk($password, $lowercase) == false:
//                         $password_message = "Need one LowerCase";
//                         break;
//                     case strlen($password) <= 7:
//                         $password_message = "Need 8 Characters";
//                         break;

//                     default:
//                         $inscription = new User(0, $username, $sanitize_email, $password_hash);
//                         $inscription->inscription();
//                         Link::redirectTo("UserConnection");

//                         break;
//                 }
//             } else {
//                 $password_message = "Different password ";
//             }
//         } else {
//             $username_message = "username trop court";
//         }
//     } else {
//         $email_message = "this email is not a valid email address";
//     }
// }

// // Aa1aza2aa
// $title = 'Inscription';

// if (empty($password_message)) {
//     $password_message = "";
// }
// if (empty($username_message)) {
//     $username_message = "";
// }
// if (empty($email_message)) {
//     $email_message = "";
// }
// render('page/inscription', compact('title', 'password_message', 'username_message', 'email_message'));

// // Sanitize de l'espace
// // Checkbox
// //doublon