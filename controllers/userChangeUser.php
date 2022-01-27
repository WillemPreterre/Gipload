<?php 

require_once('../models/User.php');

pretty_print_r($_POST);
$username_post = $_POST['username'];



$newUser = new User(0, "","","");

$newUser->modifyUsername($username_post , 1);