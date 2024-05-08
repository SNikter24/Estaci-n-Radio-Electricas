<?php 
class Radar extends Controlador
{
    public function __construct()
    {
        parent::__construct();
        $this->vista->mensaje = '';
        $this->vista->alert = '';
        $this->vista->titulo = "Radar";
    }

    function cargar()
    {
        session_start();
        if (isset($_SESSION['rol'])) {
            $this->verRadar();
        } else {
            $this->vista->aviso = "Radar";
            $this->vista->cargar('Radar/index');
        }
    }

    function verRadar(){     
        if (!isset($_SESSION['rol'])) {
            header('location: ' . constant('URL') . 'Login');
        } else {   
        $this->vista->aviso = "CONTÁCTO DESDE ADMINISTRADOR";
        $this->vista->cargar('Radar/index');
        }
    }







}