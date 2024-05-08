<?php
class Programa extends Controlador
{
    public function __construct()
    {
        parent::__construct();
        $this->vista->mensaje = '';
        $this->vista->alert = '';
        $this->vista->titulo = "Programacion";
    }

    function cargar()
    {
        session_start();
        if (isset($_SESSION['rol'])) {
            $this->verPrograma();
        } else {
            $this->vista->aviso = "Programacion ";
            $this->vista->cargar('Programacion/index');
        }
    }

    function verPrograma(){     
        if (!isset($_SESSION['rol'])) {
            header('location: ' . constant('URL') . 'Login');
        } else {   
        $this->vista->aviso = "CONTÁCTO DESDE ADMINISTRADOR";
        $this->vista->cargar('Programacion/index');
        }
    }






}