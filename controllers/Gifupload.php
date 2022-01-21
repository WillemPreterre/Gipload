<?php
require_once('../others/utils.php');

 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    pretty_print_r($_FILES);
}  



$title = ('Gif upload');

render('page/uploadGIF', compact('title'));