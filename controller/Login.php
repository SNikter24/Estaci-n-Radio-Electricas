<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * @author Jonathan Cabrera 
 */
class Login extends Controlador
{

    public function __construct()
    {
        parent::__construct();
        $this->vista->mensaje = '';
        $this->vista->alert = '';
        $this->vista->titulo = "LOGIN";
    }

    function cargar()
    {
        session_start();
        if (isset($_SESSION['rol']) && $_SESSION['rol'] != 3) {
            $this->validando();
        } else {
            $this->vista->aviso = "INICIO DE SESIÓN";
            $this->vista->cargar('main/login');
        }
    }

    function cargarWarning()
    {
        if (isset($_SESSION['rol']) && $_SESSION['rol'] != 3) {
            $this->validando();
        } else {
            $this->vista->aviso = "INICIO DE SESIÓN";
            $this->vista->cargar('main/login');
            session_unset();
            session_abort();
        }
    }

    public function cerrarSesion()
    {
        session_start();
        if (!isset($_SESSION['rol'])) {
            $this->cargar();
        } else {
            session_unset();

            session_destroy();
            header("location: " . constant('URL') . "Login");
        }
    }

    public function sessiones($param)
    {
        switch ($param) {
            case 1:
                header('location: ' . constant('URL') . 'Admin');
                $_SESSION['rolMostrar'] = 'ADMINISTRADOR';
                break;
            case 2:
                header('location: ' . constant('URL') . 'Usuarios');
                $_SESSION['rolMostrar'] = 'USUARIO';
                break;

            default:
                $this->vista->mensaje = 'CREDENCIALES NO HABILITADAS';
                $this->vista->alert = 'alert alert-warning';
                $this->cargarWarning();
                break;
        }
    }

    function validando()
    {
        if (isset($_SESSION['rol'])) {
            $this->sessiones($_SESSION['rol']);
        } else if (isset($_POST['cedula']) && isset($_POST['clave'])) {
            $cedula = $_POST['cedula'];
            $clave = $_POST['clave'];

            $this->vista->mensaje = '';
            $this->vista->alert = '';
            $resultado = $this->modelo->validarUser(['cedula' => $cedula, 'clave' => $clave]);

            if (isset($_SESSION['rol'])) {
                $_SESSION['cedula'] = $cedula;
                $this->sessiones($resultado);
                
            } else {
                $this->vista->mensaje = 'Cédula y/o Clave incorrectos';
                $this->vista->alert = 'alert alert-danger';
                $this->cargar();
            }
        } else {
            $this->cargar();
        }
    }

}