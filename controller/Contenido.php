
<?php

class Contenido extends Controlador
{

    public function __construct()
    {
        parent::__construct();
        $this->vista->mensaje = '';
        $this->vista->alert = '';
        $this->vista->titulo = "Contenido";
    }

    function cargar()
    {
        session_start();
        if (isset($_SESSION['rol'])) {
            $this->verContenido();
        } else {
            $this->vista->aviso = "Contenido";
            $this->vista->cargar('Contenido/index');
        }
    }

    function verContenido(){     
        if (!isset($_SESSION['rol'])) {
            header('location: ' . constant('URL') . 'Login');
        } else {   
        $this->vista->aviso = "CONTÁCTO DESDE ADMINISTRADOR";
        $this->vista->cargar('Contenido/index');
        }
    }
}