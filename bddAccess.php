<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class Db {
    private static $instance = NULL;

    private function __construct() {}

    private function __clone() {}

    public static function getInstance() {
        if (!isset(self::$instance)) {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            self::$instance = new PDO('mysql:host=localhost;dbname=ardoise_numerique;charset=utf8','root', '', $pdo_options);
        }
        return self::$instance;
    }
}

?>