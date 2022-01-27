<?php 

require_once('../models/User.php');
require_once('../models/Link.php');

$usercookie = $_COOKIE['name'];
$username_post = $_POST['username'];

$newUser = new User(0,"","","");

$newUser->modifyUsername($username_post , $_COOKIE['name']);

Link::redirectTo("/?page=edit/".$usercookie  );

