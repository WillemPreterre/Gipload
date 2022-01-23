<?php

require_once('../models/Gif.php');
require_once('../models/Sanitize.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    extract($_POST);
    pretty_print_r($_POST);
    // récupération post des valeurs 
    $categorie_name = $_POST["form_gifName"];
    $categorie_post = $_POST["form_gifCategorie"];

    // sanitize 
    $sanitize_name = Sanitize::text($categorie_name);

    // hash name 
    $hash_name = hash('md5',$sanitize_name);
    pretty_print_r($_FILES);
    
    pretty_print_r(basename($_FILES["gif_upload"]["name"]));


    $target_dir = "../assets/gifs/";

    $newfilename= date('dmYHis').str_replace(" ", "", basename($_FILES["gif_upload"]["name"]));

    $renameGif = move_uploaded_file($_FILES["gif_upload"]["tmp_name"], $target_dir . $newfilename);

    $target_file = $target_dir . basename($_FILES["gif_upload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["gif_upload"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    // if (file_exists($target_file)) {
    //     echo "Sorry, file already exists.";
    //     $uploadOk = 0;
    // }

    // Check file size
    if ($_FILES["gif_upload"]["size"] > 8000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "gif") {
        echo "Sorry, only GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
       
            $newgif = new Gif($sanitize_name,$newfilename, $_FILES["gif_upload"]["size"], $_COOKIE['name'], $categorie_post);
            $newgif->addGif();
            echo'work';
    }
}
