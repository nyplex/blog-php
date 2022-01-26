<?php 


namespace App;

class App {

    const NAME = 'blog';
    const USER = 'root';
    const PASSWORD = '';
    const HOST = 'localhost';
    private static $database;
    private static $title = "template";

    public static function getDatabase()
    {
        if(self::$database === null){
            self::$database = new Config(self::NAME, self::USER, self::PASSWORD, self::HOST);
        }
        
        return self::$database;
    }

    public static function notFound()
    {
        header("HTTP/1.0 404 Not Found");
        header('Location: index.php?p=404');
    }

    public static function getTitle()
    {
        return self::$title;
    }

    public static function setTitle($title)
    {
        self::$title = $title;
    }


}