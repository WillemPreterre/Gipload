<?php
require_once ('../others/utils.php');
require_once('../models/Link.php');


    setcookie("name", '', time() -7000000, '/');

Link::redirectTo("UserConnection");

$title = 'Disconnected';

render('/page/user_deconnection',compact('title'));