<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LoginModelo
 *
 * @author Jonathan Cabrera
 */
require_once 'model/User.php';

class LoginModelo extends Modelo {

    public function __construct() {
        parent::__construct();
    }

    public function validarUser($datos) {
        //$resultados = array();
        $query = $this->db->conectar()->prepare('SELECT * FROM empleado WHERE cedula = :cedula AND clave = :clave');
        try {
            $query->execute(['cedula' => $datos['cedula'], 'clave' => $datos['clave']]);

            $row = $query->fetch(PDO::FETCH_NUM); //convierte un arreglo

            if ($row == true) {
                session_start();
                $_SESSION['rol'] = $row[1];
                $_SESSION['cedulaEmpleado'] = $row[0];
                $_SESSION['nombreEmpleado'] = $row[3];

               /* $resultados['rol'] = $_SESSION['rol'];
                $resultados['cedulaEmpleado'] = $_SESSION['cedulaEmpleado'];
                $resultados['nombreEmpleado'] = $_SESSION['nombreEmpleado'];

                */
                return $_SESSION['rol'];
            } else {
                return false;
            }
        } catch (PDOException $exc) {
            return false;
        }
    }

}

