<?php
require_once('../others/utils.php');
require_once('../models/User.php');
require_once('../models/Sanitize.php');

// mettre en classe
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
    $patternPassword = "^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]\S{8,}^";
    // Password
    // Email [a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$ 

    $sanitize_email = Sanitize::email($email);
    $sanitize_username = Sanitize::text($username);
    // $regex_password = Sanitize::regex($patternPassword, $password);

    $uppercase = "AZERTYUIOPQSDFGHJKLMWXCVBN";
    $lowercase = "azertyuiopqsdfghjklmwxcvbn";
    $number = "1234567890";

    if (isset($sanitize_email, $sanitize_username)) {
        if ($username == $sanitize_username) {
            if ($password == $validate_password) {
                switch ($password) {
                    case strpbrk($password, $uppercase) == NULL:
                        echo ("Need one UpperCase");
                        break;
                    case strpbrk($password, $number) == NULL:
                        echo ("Need one number");
                        break;
                    case strpbrk($password, $lowercase) == false:
                        echo ("Need one LowerCase");
                        break;
                    case strlen($password) <= 8:
                        echo ("Need 8 Character");
                        break;

                    default:
                        echo ("password correct");
                        $inscription = new User(0, $username, $sanitize_email, $password);
                        $inscription->inscription();
                        break;
                }
            } else {
                echo "Different password ";
            }
        } else {
            echo "Wrong username";
        }
    }
}

// Aa1aza2aa
$title = 'Inscription';

render('page/inscription', compact('title'));

// Sanitize de l'espace
// Checkbox