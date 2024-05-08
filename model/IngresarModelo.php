<?php




require_once 'model/RolEmpleado.php';
require_once 'model/Items.php';
require_once 'model/subitems.php';
require_once 'model/Archivos.php';
require_once 'model/Comentarios.php';
class IngresarModelo extends Modelo
{

    public function __construct()
    {
        parent::__construct();
    }

    

    public function insertarEmple($datos)
    {
        try {
            $query = $this->db->conectar()->prepare('INSERT INTO empleado(cedula, rol_empleado_id, apellido, nombre, correo, clave)VALUES(:cedula, :rol_empleado_id, :apellido, :nombre, :correo, :clave)');
            $query->execute([
                'cedula' => $datos['cedula'],
                'rol_empleado_id' => $datos['estado'],
                'apellido' => $datos['apellido'],
                'nombre' => $datos['nombre'],
                'correo' => $datos['correo'],
                'clave' => $datos['clave']
            ]);
            return true;
        } catch (PDOException $ex) {
            echo 'Error: ' . $ex->getMessage();
            return false;
        }
    }

    public function insertarCelularEmpleado($datos)
    {
        try {
            $query = $this->db->conectar()->prepare('INSERT INTO empleado_celular(vendedor_cedula, numero)VALUES(:cedula, :numero)');
            $query->execute([
                'cedula' => $datos['cedula'],
                'numero' => $datos['telefono']
            ]);
            return true;
        } catch (PDOException $ex) {
            echo 'Error: ' . $ex->getMessage();
            return false;
        }
    }


    public function getEstadoEmpleado()
    {
        $filas = [];
        try {
            $query = $this->db->conectar()->query('SELECT * FROM rol_empleado order by id desc');
            while ($dato = $query->fetch()) {
                $fila = new RolEmpleado();
                $fila->id = $dato['id'];
                $fila->cargo = $dato['cargo'];
                array_push($filas, $fila);
            }
            return $filas;
        } catch (PDOException $exc) {
            return [];
        }
    }
  




    public function getEstadoItem()
{
    $filas = [];
    try {
        $query = $this->db->conectar()->query('SELECT * FROM items ORDER BY id DESC');
        while ($dato = $query->fetch()) {
            $fila = new Items();
            $fila->id = $dato['id'];
            $fila->nombre = $dato['nombre'];
            array_push($filas, $fila);
        }
        return $filas;
    } catch (PDOException $exc) {
        return [];
    }
}
public function getEstadosItem()
{
    $filas = [];
    try {
        $query = $this->db->conectar()->query('SELECT * FROM items ORDER BY id DESC');
        while ($dato = $query->fetch()) {
            $fila = new Items();
            $fila->id = $dato['id'];
            $fila->nombre = $dato['nombre'];
            array_push($filas, $fila);
        }
        return $filas;
    } catch (PDOException $exc) {
        return [];
    }
}



public function insertarItem($datos)
{
    try {
        $query = $this->db->conectar()->prepare('INSERT INTO items (id, nombre) VALUES (:id, :nombre)');
        $query->execute(['id' => $datos['id'], 'nombre' => $datos['nombre']]);
        return true;
    } catch (PDOException $exc) {
        return false;
    }
}

public function getSubitems()
{
    $filas = [];
    try {
        $query = $this->db->conectar()->query('SELECT nombre, contenido, imagen, enlace FROM subitems ORDER BY id DESC');
        while ($dato = $query->fetch()) {
            $fila = new subitems();
            $fila->nombre = $dato['nombre'];
            $fila->contenido = $dato['contenido'];
            $fila->imagen = $dato['imagen'];
            $fila->enlace = $dato['enlace'];
            array_push($filas, $fila);
        }
        return $filas;
    } catch (PDOException $exc) {
        return [];
    }
}


public function insertarSubitem($datos)
{
    try {
        $query = $this->db->conectar()->prepare('INSERT INTO subitems (id_item, nombre, contenido, imagen, enlace) VALUES (:id_item, :nombre, :contenido, :imagen, :enlace)');
        $query->execute(['id_item' => $datos['id_item'], 'nombre' => $datos['nombre'], 'contenido' => $datos['contenido'], 'imagen' => $datos['imagen'], 'enlace' => $datos['enlace']]);
        return true;
    } catch (PDOException $exc) {
        echo $exc->getMessage();
        return false;
    }
}
///************************************************* */
// ACA COMIENZA LOS EJERCICIOS Y SUB EJERCICIOS

public function getEstadoEjercicios()
{
    $filas = [];
    try {
        $query = $this->db->conectar()->query('SELECT * FROM ejercicio ORDER BY id DESC');
        while ($dato = $query->fetch()) {
            $fila = new Items();
            $fila->id = $dato['id'];
            $fila->nombre = $dato['nombre'];
            array_push($filas, $fila);
        }
        return $filas;
    } catch (PDOException $exc) {
        return [];
    }
}
public function getEstadosEjercicios()
{
    $filas = [];
    try {
        $query = $this->db->conectar()->query('SELECT * FROM ejercicio ORDER BY id DESC');
        while ($dato = $query->fetch()) {
            $fila = new Items();
            $fila->id = $dato['id'];
            $fila->nombre = $dato['nombre'];
            array_push($filas, $fila);
        }
        return $filas;
    } catch (PDOException $exc) {
        return [];
    }
}



public function insertarEjercicios($datos)
{
    try {
        $query = $this->db->conectar()->prepare('INSERT INTO ejercicio (id, nombre) VALUES (:id, :nombre)');
        $query->execute(['id' => $datos['id'], 'nombre' => $datos['nombre']]);
        return true;
    } catch (PDOException $exc) {
        return false;
    }
}

public function getSubEjercicio()
{
    $filas = [];
    try {
        $query = $this->db->conectar()->query('SELECT nombre, contenido, imagen, enlace FROM subejercicio ORDER BY id DESC');
        while ($dato = $query->fetch()) {
            $fila = new subitems();
            $fila->nombre = $dato['nombre'];
            $fila->contenido = $dato['contenido'];
            $fila->imagen = $dato['imagen'];
            $fila->enlace = $dato['enlace'];
            array_push($filas, $fila);
        }
        return $filas;
    } catch (PDOException $exc) {
        return [];
    }
}


public function insertarSubEjercicios($datos)
{
    try {
        $query = $this->db->conectar()->prepare('INSERT INTO subejercicio (id_item, nombre, contenido, imagen, enlace) VALUES (:id_item, :nombre, :contenido, :imagen, :enlace)');
        $query->execute(['id_item' => $datos['id_item'], 'nombre' => $datos['nombre'], 'contenido' => $datos['contenido'], 'imagen' => $datos['imagen'], 'enlace' => $datos['enlace']]);
        return true;
    } catch (PDOException $exc) {
        echo $exc->getMessage();
        return false;
    }
}




///************************************************* */
// ACA COMIENZA LOS Radar Y SUB Radar

public function getEstadoRadares()
{
    $filas = [];
    try {
        $query = $this->db->conectar()->query('SELECT * FROM radar ORDER BY id DESC');
        while ($dato = $query->fetch()) {
            $fila = new Items();
            $fila->id = $dato['id'];
            $fila->nombre = $dato['nombre'];
            array_push($filas, $fila);
        }
        return $filas;
    } catch (PDOException $exc) {
        return [];
    }
}
public function getEstadosRadares()
{
    $filas = [];
    try {
        $query = $this->db->conectar()->query('SELECT * FROM radar ORDER BY id DESC');
        while ($dato = $query->fetch()) {
            $fila = new Items();
            $fila->id = $dato['id'];
            $fila->nombre = $dato['nombre'];
            array_push($filas, $fila);
        }
        return $filas;
    } catch (PDOException $exc) {
        return [];
    }
}



public function insertarradares($datos)
{
    try {
        $query = $this->db->conectar()->prepare('INSERT INTO radar (id, nombre) VALUES (:id, :nombre)');
        $query->execute(['id' => $datos['id'], 'nombre' => $datos['nombre']]);
        return true;
    } catch (PDOException $exc) {
        return false;
    }
}

public function getSubRadar()
{
    $filas = [];
    try {
        $query = $this->db->conectar()->query('SELECT nombre, contenido, imagen, enlace FROM subradar ORDER BY id DESC');
        while ($dato = $query->fetch()) {
            $fila = new subitems();
            $fila->nombre = $dato['nombre'];
            $fila->contenido = $dato['contenido'];
            $fila->imagen = $dato['imagen'];
            $fila->enlace = $dato['enlace'];
            array_push($filas, $fila);
        }
        return $filas;
    } catch (PDOException $exc) {
        return [];
    }
}


public function insertarSubRadares($datos)
{
    try {
        $query = $this->db->conectar()->prepare('INSERT INTO subradar (id_item, nombre, contenido, imagen, enlace) VALUES (:id_item, :nombre, :contenido, :imagen, :enlace)');
        $query->execute(['id_item' => $datos['id_item'], 'nombre' => $datos['nombre'], 'contenido' => $datos['contenido'], 'imagen' => $datos['imagen'], 'enlace' => $datos['enlace']]);
        return true;
    } catch (PDOException $exc) {
        echo $exc->getMessage();
        return false;
    }
}


  


// ACA COMIENZA LOS Programas Y SUB Programas

public function getEstadoProgramas()
{
    $filas = [];
    try {
        $query = $this->db->conectar()->query('SELECT * FROM programa ORDER BY id DESC');
        while ($dato = $query->fetch()) {
            $fila = new Items();
            $fila->id = $dato['id'];
            $fila->nombre = $dato['nombre'];
            array_push($filas, $fila);
        }
        return $filas;
    } catch (PDOException $exc) {
        return [];
    }
}
public function getEstadosProgramas()
{
    $filas = [];
    try {
        $query = $this->db->conectar()->query('SELECT * FROM programa ORDER BY id DESC');
        while ($dato = $query->fetch()) {
            $fila = new Items();
            $fila->id = $dato['id'];
            $fila->nombre = $dato['nombre'];
            array_push($filas, $fila);
        }
        return $filas;
    } catch (PDOException $exc) {
        return [];
    }
}



public function insertarprogramas($datos)
{
    try {
        $query = $this->db->conectar()->prepare('INSERT INTO programa (id, nombre) VALUES (:id, :nombre)');
        $query->execute(['id' => $datos['id'], 'nombre' => $datos['nombre']]);
        return true;
    } catch (PDOException $exc) {
        return false;
    }
}

public function getSubProgramas()
{
    $filas = [];
    try {
        $query = $this->db->conectar()->query('SELECT nombre, contenido, imagen, enlace FROM subprograma ORDER BY id DESC');
        while ($dato = $query->fetch()) {
            $fila = new subitems();
            $fila->nombre = $dato['nombre'];
            $fila->contenido = $dato['contenido'];
            $fila->imagen = $dato['imagen'];
            $fila->enlace = $dato['enlace'];
            array_push($filas, $fila);
        }
        return $filas;
    } catch (PDOException $exc) {
        return [];
    }
}


public function insertarSubProgramas($datos)
{
    try {
        $query = $this->db->conectar()->prepare('INSERT INTO subprograma (id_item, nombre, contenido, imagen, enlace) VALUES (:id_item, :nombre, :contenido, :imagen, :enlace)');
        $query->execute(['id_item' => $datos['id_item'], 'nombre' => $datos['nombre'], 'contenido' => $datos['contenido'], 'imagen' => $datos['imagen'], 'enlace' => $datos['enlace']]);
        return true;
    } catch (PDOException $exc) {
        echo $exc->getMessage();
        return false;
    }
}

  
    
///// Aca empieza archivos 

public function getArchivos()
{
    $filas = [];
    try {
        $query = $this->db->conectar()->query('SELECT * FROM Archivos ORDER BY ID_Archivo DESC');
        while ($dato = $query->fetch()) {
            $fila = new Archivos();
            $fila->ID_Archivo = $dato['ID_Archivo'];
            $fila->nombre_archivo = $dato['Nombre_Archivo'];
            $fila->cedula = $dato['cedula'];
            $fila->datos_archivo = $dato['Datos_Archivo'];
            $fila->fecha_subida = $dato['Fecha_Subida'];
            array_push($filas, $fila);
        }
        return $filas;
    } catch (PDOException $exc) {
        return [];
    }
}

public function insertarArchivo($datos)
{
    try {
        $query = $this->db->conectar()->prepare('INSERT INTO Archivos (Nombre_Archivo, cedula, Datos_Archivo) VALUES (:Nombre_Archivo, :cedula, :Datos_Archivo)');
        $query->execute(['Nombre_Archivo' => $datos['Nombre_Archivo'], 'cedula' => $datos['cedula'], 'Datos_Archivo' => $datos['Datos_Archivo']]);
        return true;
    } catch (PDOException $exc) {
        echo $exc->getMessage();
        return false;
    }
}



public function getcomentarios()
{
    $filas = [];
    try {
        $query = $this->db->conectar()->query('SELECT * FROM comentarios ORDER BY ID_Comentario DESC');
        while ($dato = $query->fetch()) {
            $fila = new Comentarios();
            $fila->ID_Comentario = $dato['ID_Comentario'];
            $fila->ID_Archivo = $dato['ID_Archivo'];
            $fila->cedula = $dato['cedula'];
            $fila->Comentario_Texto = $dato['Comentario_Texto'];
            $fila->Fecha_Comentario = $dato['Fecha_Comentario'];
            array_push($filas, $fila);
        }
        return $filas;
    } catch (PDOException $exc) {
        return [];
    }
}

public function insertarComentario($datos)
{
    try {
        $query = $this->db->conectar()->prepare('INSERT INTO Comentarios (ID_Archivo , cedula, Comentario_Texto) VALUES (:ID_Archivo, :cedula, :Comentario_Texto)');
        $query->execute(['ID_Archivo' => $datos['ID_Archivo'], 'cedula' => $datos['cedula'], 'Comentario_Texto' => $datos['Comentario_Texto']]);
        return true;
    } catch (PDOException $exc) {
        echo $exc->getMessage();
        return false;
    }
}

    
    
    
    
    


    

    
}