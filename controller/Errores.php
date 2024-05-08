<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Error
 *
 * @author Jonathan Cabrera 
 */
require_once './libs/Controlador.php';
class Errores extends Controlador{
    public function __construct() {
        parent::__construct();
        $this->vista->mensaje = "ERROR AL CARGAR EL RECURSO";
        $this->vista->titulo = "ERROR";
    }
    
    function cargar(){
        $this->vista->cargar('error/index');
    }

}
