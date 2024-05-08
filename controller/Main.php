<?php

class Main extends Controlador{
    public function __construct() {
        parent::__construct();
        $this->vista->titulo = "PÁGINA PRINCIPAL";
    }
    
    function cargar(){session_start();
        if (isset($_SESSION['rol'])) {
            $this->verInicio();
        } else {
            $this->vista->aviso = "PÁGINA PRINCIPAL";
            $this->vista->cargar('main/index');
        }
    }

    function verInicio(){        
        $this->vista->aviso = "";
        $this->vista->cargar('main/index');
    }

}