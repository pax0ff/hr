<?php

class Database
{
    private static $database = null;

    private function __construct() {
        
    }

    public static function getDatabase() {
        if(is_null(self::$database)) {
            self::$database = new PDO("mysql:host=localhost;dbname=todo_php", 'root', 'root');
        }
        return self::$database;
    }
}
?>