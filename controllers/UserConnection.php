<?php
require_once('../others/utils.php');
require_once('../models/User.php');

$cookie_name = "user";
$cookie_value = "John Doe";

$connection = new User(0,'' ,'' , '');
$connection->connection();
$title = 'Connection';
pretty_print_r($_COOKIE);

render('page/Connection', compact('title'));
