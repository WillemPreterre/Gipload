<?php
require_once('../models/Link.php');


    setcookie("name", '', time() -700, '/');

Link::redirectTo("UserConnection");

