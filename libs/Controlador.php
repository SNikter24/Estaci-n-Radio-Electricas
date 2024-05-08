<?php

class Controlador {
    public function __construct() {
        $this->vista = new Vista();
    }
    
    function cargarModelo($modelo) {
        $url = 'model/'.$modelo.'Modelo.php';
        
        if (file_exists($url)) {
            require $url;
            
            $nombreModelo = $modelo.'modelo';
            $this->modelo = new $nombreModelo();
        }
    }

}
