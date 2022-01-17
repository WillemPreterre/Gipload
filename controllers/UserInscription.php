<?php
require_once('../others/utils.php');
require_once('../models/User.php');
require_once('../models/Sanitize.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Extract all the name in the form can use it to take the data from form
    extract($_POST);
    print_r($_POST);
    // Get all the data and put it on a var
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    //Get this information to 
    $validate_password = $_POST["validate_password"];

    // ^ start the regex \ S* Any set of characters / (?=\S{8,}) At least 8 length / (?=\S*[a-z]) One lowercase / (?=\S*[A-Z]) One Uppercase / (?=\S*[\d]) At least one number / $ end the regex
    $pattern = '^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$'; // Password
   // [a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$ // Email

    $sanitize_email = Sanitize::email($email);
    $inscription = new User(0,$username, $sanitize_email, $password);
        $inscription->inscription();
        echo $sanitize_email;

}
$title = 'Inscription';

render('page/inscription', compact('title'));
