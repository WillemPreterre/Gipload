<?php
require_once('../others/utils.php');
require_once('../models/Gif.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    extract($_POST);

    $categorie_post = $_POST["form_gifCategorie"];
    $categorie = new Gif("", "", 0, 0, $categorie_post);
    $categorie->getCategorie();
}
$title = ('Gif upload');

$categorie = new Gif("", "", 0, 0, 0);
$categorieSelectAll = $categorie->getCategorie();
render('page/upload_gif', compact('title', 'categorieSelectAll'));
