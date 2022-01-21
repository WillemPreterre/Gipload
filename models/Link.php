
<?php


class Link {

    public static function redirectTo($path)
    {
        header('Location:' . $path . '.php');
        exit();
    }

}