<?php
class DatabaseClient {
    private static $instance = null;
    private $databse;
    private $username = 'root';
    private $password = '';

public function __construct(){
        $this->database = new PDO('mysql:dbname=GestionEtudiant;host=localhost',
            $this->username,
            $this->password,
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ]
    );

    }

public static function getDatabase(){

        if(is_null(self::$instance)){
            self::$instance = new DatabaseClient();
        }
        return self::$instance->database;
    }
}



