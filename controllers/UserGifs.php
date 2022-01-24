<?php 
require_once('../others/utils.php');
require_once ('../models/User.php');
require_once ('../models/Gif.php');

extract($_GET);
// drop the get from the url
$user_id = $_GET['name']; 

// Get all gif from the user
$edit = new Gif('', '', 0, 0,0);
$user_gifs = $edit->getAllGifFromUser($user_id);

//get information from the user
$edit = new User(0, '', '', '');
$user_edit = $edit->getInformation($user_id);


$title = 'Your GIF';

render('/page/user_gifs',compact('title','user_edit','user_gifs'));