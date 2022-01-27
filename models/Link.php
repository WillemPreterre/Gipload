
<?php


class Link {

    public static function redirectTo($path)
    {
        header('Location:' . $path );
        exit();
    }

}