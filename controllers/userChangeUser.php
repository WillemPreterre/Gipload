<?php 

require_once('../models/User.php');
require_once('../models/Link.php');
require_once('../models/Sanitize.php');

//récupération du cookie et du post
$usercookie = $_COOKIE['name'];
$username_post = $_POST['username'];

$newUser = new User(0,"","","");
// on modifie le username
// fonctionnalité il faut mettre le mot de passe pour sécurité.
$newUser->modifyUsername($username_post , $_COOKIE['name']);
// on redirige quand c'est bon
Link::redirectTo("/?page=edit/".$usercookie  );

