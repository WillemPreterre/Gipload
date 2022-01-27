<?php

function pretty_print_r($var) {
    echo '<pre>'.print_r($var, true).'</pre>';
  }


// $param_url pour récupérer la view , param_array pour récup les éléments qu'on veut envoyer
  function render($param_url , $param_array = array()) {
    // récupération des éléments du array on les décompact 
    extract($param_array);
    // On met dans le cache
    ob_start();
    // on charge la view
    require_once "views/". $param_url. '.php';
    // on charge le contenu dans le default
    $content = ob_get_clean();
    require_once './views/default.php'; 
  }
