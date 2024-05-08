<?php

require_once 'controller/Errores.php';

class App {//Acá se deben llamar los controller, es genérico y depende con el URL

    public function __construct() {

        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        if (empty($url[0])) {
            $archivoControlador = 'controller/Main.php';
            require_once $archivoControlador;
            $controlador = new Main();
            $controlador->cargarModelo('Main');
            $controlador->cargar();
            return false;
        }

        $archivoControlador = 'controller/' . $url[0] . '.php';

        if (file_exists($archivoControlador)) {
            require_once $archivoControlador;
            $controlador = new $url[0];
            $controlador->cargarModelo($url[0]);

            //número de elementos del arreglo
            $nparam = sizeof($url);

            if ($nparam > 1) {
                if ($nparam > 2) {
                    $param = [];
                    for ($i = 2; $i < $nparam; $i++) {
                        array_push($param, $url[$i]);
                    }
                    $controlador->{$url[1]}($param);
                } else {
                    $controlador->{$url[1]}(); //Main::Función()
                }
            } else {
                $controlador->cargar();
            }
        } else {
            $controller = new Errores();
            $controller->cargar();
        }
    }

}
