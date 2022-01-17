<?php
require_once('../others/utils.php');
require_once('../models/User.php');
require_once('../models/Sanitize.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Extract all the name in the form can use it to take the data from form
    extract($_POST);
    // print_r($_POST);
    // Get all the data and put it on a var
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    //Get this information to 
    $validate_password = $_POST["validate_password"];

    // ^ start the regex \ S* Any set of characters / (?=\S{8,}) At least 8 length / (?=\S*[a-z]) One lowercase / (?=\S*[A-Z]) One Uppercase / (?=\S*[\d]) At least one number / $ end the regex
    $patternPassword = "^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}^"; 
    // Password
    // Email [a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$ 

    $sanitize_email = Sanitize::email($email);
    $regex_password = Sanitize::regex($patternPassword, $password);
    // if ($regex_password)
    if (isset($sanitize_email)) {
        $inscription = new User(0, $username, $sanitize_email, $password);
        $inscription->inscription();
    }
}
$title = 'Inscription';

render('page/inscription', compact('title'));
