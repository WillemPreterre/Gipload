<?php 
require_once('../others/utils.php');
require_once ('../models/User.php');

extract($_GET);
// pretty_print_r($_GET); 
$user_id = $_GET['name']; 
$edit = new Gif('', '', 0, 0,0);
$user_gif = $edit->getAllGifFromUser($user_id);



$title = 'Your GIF';

render('/page/userGif',compact('title','user_edit'));