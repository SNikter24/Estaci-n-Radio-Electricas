<?php 
class Ejercicios extends Controlador {
    public function __construct()
    {
        parent::__construct();
        $this->vista->mensaje = '';
        $this->vista->alert = '';
        $this->vista->titulo = "Ejercicios";
    }

    function cargar()
    {
        session_start();
        if (isset($_SESSION['rol'])) {
            $this->verEjercicios();
        } else {
            $this->vista->aviso = "Ejercicios";
            $this->vista->cargar('Ejercicios/index');
        }
    }

    function verEjercicios(){     
        if (!isset($_SESSION['rol'])) {
            header('location: ' . constant('URL') . 'Login');
        } else {   
        $this->vista->aviso = "CONTÁCTO DESDE ADMINISTRADOR";
        $this->vista->cargar('Ejercicios/index');
        }
    }


}