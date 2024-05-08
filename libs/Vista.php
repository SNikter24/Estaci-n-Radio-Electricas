<?php

class Vista {
    public function __construct() {
        
    }
    
    public function cargar($nombre) {
        require 'view/'.$nombre.'.php';
    }

}