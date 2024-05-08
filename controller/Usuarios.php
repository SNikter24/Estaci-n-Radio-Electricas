<?php

class Usuarios extends Controlador{
    public function __construct() {
        parent::__construct();
        $this->vista->titulo = "PANEL DE USUARIO";
    }

    function cargar() {
        session_start();
        if (!isset($_SESSION['rol'])) {
            header('location: ' . constant('URL') . 'Login');
        } else {
            if ($_SESSION['rol'] != 2) {
                header('location: ' . constant('URL') . 'Login');
            } else {
                $this->vista->aviso = "Bienvenido";
                $this->vista->alerta = 'alert alert-warning';
                $this->vista->mensaje = 'Bienvenidos ';
                $this->vista->cargar('usuarios/index');
            }
        }
    }

}