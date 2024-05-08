<?php

class BaseDatos {

    private $host;
    private $db;
    private $user;
    private $pass;
    private $charset;

    public function __construct() {
        $this->host = constant('HOST');
        $this->db = constant('DB');
        $this->user = constant('USER');
        
        
        $this->charset = constant('CHARSET');
    }

    public function conectar() {
        try {
            $conn = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset ;
            $op = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            $pdo = new PDO($conn, $this->user, $this->pass, $op);
            return $pdo;
        } catch (PDOException $e) {
            print_r('Error connection: ' . $e->getMessage());
        }
    }

}