<?php

class Database
{
    public static $connect;

    public static function connectDB()
    {
        self::$connect = new PDO('mysql:dbname=gif;host=localhost;charset=utf8', 'root', '', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
        return self::$connect;
    }
}
