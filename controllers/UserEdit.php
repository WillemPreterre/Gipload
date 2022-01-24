<?php
require_once ('../others/utils.php');
require_once ('../models/User.php');

extract($_GET);
// pretty_print_r($_GET); 
$user_id = $_GET['name']; 
$edit = new User(0, '', '', '');
$user_edit = $edit->getInformation($user_id);

pretty_print_r($user_edit);



$title = 'Your profile';

render('/page/user_edit',compact('title','user_edit'));
