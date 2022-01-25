<?php 
require_once('../others/utils.php');
require_once ('../models/Gif.php');

$gif_id = $_GET['id']; 
pretty_print_r($gif_id);
$info_gif = new Gif("","",0,0,0);

$allInformationGif = $info_gif->getOneGif($gif_id);

$title = 'Your profile';

render('/page/gif_info',compact('title','allInformationGif'));
