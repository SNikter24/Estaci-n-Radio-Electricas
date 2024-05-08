<?php

class Admin extends Controlador{
    public function __construct() {
        parent::__construct();
        $this->vista->titulo = "PANEL ADMIN";
    }

    function cargar() {
        session_start();
        if (!isset($_SESSION['rol'])) {
            header('location: ' . constant('URL') . 'Login');
        } else {
            if ($_SESSION['rol'] != 1) {
                header('location: ' . constant('URL') . 'Login');
            } else {
                $this->vista->aviso = "PÁNEL DE ADMINISTRACIÓN";
                $this->vista->cargar('admin/index');
            }
        }
    }

}