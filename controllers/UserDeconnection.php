<?php
require_once('../models/Link.php');

// on met un chiffre négatif pour supprimer le cookie 

    setcookie("name", '', time() -700, '/');
    
// on redirect vers une page
Link::redirectTo("UserConnection");

