<?php

require_once 'model/Empleado.php';
require_once 'model/Proveedor.php';
require_once  'model/Noticia.php';
require_once 'model/EmpleadoAuxiliar.php';
require_once 'model/RolEmpleado.php';
require_once 'model/CelularesEmpleado.php';
require_once 'model/Items.php';
require_once 'model/subitems.php';
require_once 'model/Archivos.php';
require_once 'model/Comentarios.php';
class ConsultarModelo extends Modelo
{

    public function __construct()
    {
        parent::__construct();
    }

    

    public function get_PalabraClave($palabra)
    {
        $filas = [];
        $consulta = 'SELECT * FROM empleado WHERE cedula LIKE "%' . $palabra . '%" OR nombre LIKE "%' . $palabra . '%" OR apellido LIKE "%' . $palabra . '%" OR correo LIKE "%' . $palabra . '%"';
        try {
            $query = $this->db->conectar()->query($consulta);
            while ($dato = $query->fetch()) {
                $fila = new Empleado();
                $fila->cedula = $dato['cedula'];
                $cargo = 'NO ASIGNADO';
                if ($dato['rol_empleado_id'] == 1) {
                    $cargo = 'ADMINISTRADOR';
                }
                if ($dato['rol_empleado_id'] == 2) {
                    $cargo = 'USUARIO';
                }
                $fila->rol = $cargo /*$dato['rol_empleado_id']*/;
                $fila->nombre = $dato['nombre'];
                $fila->correo = $dato['correo'];
                $fila->apellido = $dato['apellido'];
                $fila->clave = $dato['clave'];

                array_push($filas, $fila);
            }
            return $filas;
        } catch (PDOException $exc) {
            return [];
        }
    }

    

    public function eliminarEmpleadoTotal($datos)
    {
        try {
            $query = $this->db->conectar()->prepare('CALL eliminarEmpleadoTotal(:cedula,@exito)');
            $query->execute([
                'cedula' => $datos['cedula']
            ]);
            return true;
        } catch (PDOException $ex) {
            echo 'Error: ' . $ex->getMessage();
            return false;
        }
    }

    public function eliminarItems($datos)
    {
        try {
            $query = $this->db->conectar()->prepare('DELETE FROM items WHERE id = :id');
            $query->execute([
                'id' => $datos['id']
            ]);
            return true;
        } catch (PDOException $ex) {
            echo 'Error: ' . $ex->getMessage();
            return false;
        }
    }
    public function eliminarsubItems($datos)
    {
        try {
            $query = $this->db->conectar()->prepare('DELETE FROM subitems WHERE id = :id');
            $query->execute([
                'id' => $datos['id']
            ]);
            return true;
        } catch (PDOException $ex) {
            echo 'Error: ' . $ex->getMessage();
            return false;
        }
    }

    /// Aca comienzaa Eliminar Ejercicio y SubEjercicio
    public function eliminarEjercicios($datos)
    {
        try {
            $query = $this->db->conectar()->prepare('DELETE FROM ejercicio WHERE id = :id');
            $query->execute([
                'id' => $datos['id']
            ]);
            return true;
        } catch (PDOException $ex) {
            echo 'Error: ' . $ex->getMessage();
            return false;
        }
    }
    public function eliminarsubEjercicios($datos)
    {
        try {
            $query = $this->db->conectar()->prepare('DELETE FROM subejercicio WHERE id = :id');
            $query->execute([
                'id' => $datos['id']
            ]);
            return true;
        } catch (PDOException $ex) {
            echo 'Error: ' . $ex->getMessage();
            return false;
        }
    }
 ///// Aca termina


     
   /// Aca comienzaa Eliminar RADAR y SUBRADAR
   public function eliminarRadares($datos)
   {
       try {
           $query = $this->db->conectar()->prepare('DELETE FROM radar WHERE id = :id');
           $query->execute([
               'id' => $datos['id']
           ]);
           return true;
       } catch (PDOException $ex) {
           echo 'Error: ' . $ex->getMessage();
           return false;
       }
   }
   public function eliminarsubradares($datos)
   {
       try {
           $query = $this->db->conectar()->prepare('DELETE FROM subradar WHERE id = :id');
           $query->execute([
               'id' => $datos['id']
           ]);
           return true;
       } catch (PDOException $ex) {
           echo 'Error: ' . $ex->getMessage();
           return false;
       }
   }
///// Aca termina


    
    
   /// Aca comienzaa Eliminar Programa y subprograma
   public function eliminarProgramas($datos)
   {
       try {
           $query = $this->db->conectar()->prepare('DELETE FROM programa WHERE id = :id');
           $query->execute([
               'id' => $datos['id']
           ]);
           return true;
       } catch (PDOException $ex) {
           echo 'Error: ' . $ex->getMessage();
           return false;
       }
   }
   public function eliminarsubprograma($datos)
   {
       try {
           $query = $this->db->conectar()->prepare('DELETE FROM subprograma WHERE id = :id');
           $query->execute([
               'id' => $datos['id']
           ]);
           return true;
       } catch (PDOException $ex) {
           echo 'Error: ' . $ex->getMessage();
           return false;
       }
   }
///// Aca termina

 /// Aca comienzaa Eliminar Archivos 
 

 public function eliminarArchivos($datos)
 {
     try {
         $query = $this->db->conectar()->prepare('DELETE FROM Archivos WHERE ID_Archivo = :ID_Archivo');
         $query->execute([
             'ID_Archivo' => $datos['ID_Archivo']
         ]);
         return true;
     } catch (PDOException $ex) {
         echo 'Error: ' . $ex->getMessage();
         return false;
     }
 }




    public function eliminarNumeroEmpleado($datos)
    {
        try {
            $query = $this->db->conectar()->prepare('DELETE FROM empleado_celular WHERE vendedor_cedula = :cedula and numero = :numero');
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
    
    public function actualizarEmpleado($dato)
    {
        $query = $this->db->conectar()->prepare("UPDATE empleado SET rol_empleado_id=:estado,apellido=:apellido,nombre=:nombre,correo=:correo WHERE cedula = :cedula");
        try {
            $query->execute([
                'cedula' => $dato['cedula'],
                'estado' => $dato['estado'],
                'apellido' => $dato['apellido'],
                'nombre' => $dato['nombre'],
                'correo' => $dato['correo'],
            ]);
            return true;
        } catch (PDOException $exc) {
            return false;
        }
    }
    public function actualizarNoticia($dato)
    {
        $query = $this->db->conectar()->prepare("UPDATE noticias SET  image=:image, title=:title, description=:description, link=:link WHERE id = :id");
        try {
            $query->execute([
                'id' => $dato['id'],
                'image' => $dato['image'],
                'title' => $dato['title'],
                'description' => $dato['description'],
                'link' => $dato['link'],
            ]);
            return true;
        } catch (PDOException $exc) {
            return false;
        }
    }
    public function actualizarItems($dato)
    {
        $query = $this->db->conectar()->prepare("UPDATE items SET  nombre=:nombre WHERE id = :id");
        try {
            $query->execute([
                'id' => $dato['id'],
                'nombre' => $dato['nombre'],
                
            ]);
            return true;
        } catch (PDOException $exc) {
            return false;
        }
    }
    public function actualizarsubItems($dato)
    {
        $query = $this->db->conectar()->prepare("UPDATE subitems SET  nombre=:nombre,contenido=:contenido,
         imagen=:imagen,enlace=:enlace
        
         WHERE id = :id");
        try {
            $query->execute([
                'id' => $dato['id'],
                'nombre' => $dato['nombre'],
                'contenido' => $dato['contenido'],
                'imagen' => $dato['imagen'],
                'enlace' => $dato['enlace'],
                
                
            ]);
            return true;
        } catch (PDOException $exc) {
            return false;
        }
    }
    /////// Aca comieza para actualizar Ejercicio y sub Ejercicio
    public function actualizarEjercicio($dato)
    {
        $query = $this->db->conectar()->prepare("UPDATE ejercicio SET  nombre=:nombre WHERE id = :id");
        try {
            $query->execute([
                'id' => $dato['id'],
                'nombre' => $dato['nombre'],
                
            ]);
            return true;
        } catch (PDOException $exc) {
            return false;
        }
    }
    public function actualizarsubejercicio($dato)
    {
        $query = $this->db->conectar()->prepare("UPDATE subejercicio SET  nombre=:nombre,contenido=:contenido,
         imagen=:imagen,enlace=:enlace
        
         WHERE id = :id");
        try {
            $query->execute([
                'id' => $dato['id'],
                'nombre' => $dato['nombre'],
                'contenido' => $dato['contenido'],
                'imagen' => $dato['imagen'],
                'enlace' => $dato['enlace'],
                
                
            ]);
            return true;
        } catch (PDOException $exc) {
            return false;
        }
    }
    /// Aca termina



    /////// Aca comieza para actualizar Radar y sub Radar
    public function actualizarRadar($dato)
    {
        $query = $this->db->conectar()->prepare("UPDATE radar SET  nombre=:nombre WHERE id = :id");
        try {
            $query->execute([
                'id' => $dato['id'],
                'nombre' => $dato['nombre'],
                
            ]);
            return true;
        } catch (PDOException $exc) {
            return false;
        }
    }

    public function actualizarsubRadar($dato)
    {
        $query = $this->db->conectar()->prepare("UPDATE subradar SET  nombre=:nombre,contenido=:contenido,
         imagen=:imagen,enlace=:enlace
        
         WHERE id = :id");
        try {
            $query->execute([
                'id' => $dato['id'],
                'nombre' => $dato['nombre'],
                'contenido' => $dato['contenido'],
                'imagen' => $dato['imagen'],
                'enlace' => $dato['enlace'],
                
                
            ]);
            return true;
        } catch (PDOException $exc) {
            return false;
        }
    }
    /// Aca termina

     /////// Aca comieza para actualizar programa y sub programa
     public function actualizarPrograma($dato)
     {
         $query = $this->db->conectar()->prepare("UPDATE programa SET  nombre=:nombre WHERE id = :id");
         try {
             $query->execute([
                 'id' => $dato['id'],
                 'nombre' => $dato['nombre'],
                 
             ]);
             return true;
         } catch (PDOException $exc) {
             return false;
         }
     }
 
     public function actualizarsubPrograma($dato)
     {
         $query = $this->db->conectar()->prepare("UPDATE subprograma SET  nombre=:nombre,contenido=:contenido,
          imagen=:imagen,enlace=:enlace
         
          WHERE id = :id");
         try {
             $query->execute([
                 'id' => $dato['id'],
                 'nombre' => $dato['nombre'],
                 'contenido' => $dato['contenido'],
                 'imagen' => $dato['imagen'],
                 'enlace' => $dato['enlace'],
                 
                 
             ]);
             return true;
         } catch (PDOException $exc) {
             return false;
         }
     }
     /// Aca termina










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

    public function getNumerosEmpleado($cedula)
    {
        $filas = [];
        $consulta = "SELECT * FROM empleado_celular WHERE vendedor_cedula = " . $cedula;
        try {
            $query = $this->db->conectar()->query($consulta);
            while ($dato = $query->fetch()) {
                $fila = new CelularesEmpleado();
                $fila->cedula = $dato['vendedor_cedula'];
                $fila->numero = $dato['numero'];
                array_push($filas, $fila);
            }
            return $filas;
        } catch (PDOException $exc) {
            return [];
        }
    }

    public function getByIdEmpleado($cedula)
    {
        $item = new EmpleadoAuxiliar();
        $celulares = [];

        $query = $this->db->conectar()->prepare('SELECT * FROM empleado WHERE cedula = :cedula');
        try {
            $query->execute(['cedula' => $cedula]);
            while ($row = $query->fetch()) {
                $item->cedula = $row['cedula'];
                $cargo = 'NO ASIGNADO';
                if ($row['rol_empleado_id'] == 1) {
                    $cargo = 'ADMINISTRADOR';
                }
                if ($row['rol_empleado_id'] == 2) {
                    $cargo = 'USUARIO';
                }
                $item->cargo = $cargo;
                $item->rol = $row['rol_empleado_id'];
                $item->nombre = $row['nombre'];
                $item->correo = $row['correo'];
                $item->apellido = $row['apellido'];
                $item->clave = $row['clave'];
            }
            return $item;
        } catch (PDOException $exc) {
            return null;
        }
    }

    public function getByIdNoticias($id)
    {
        $item = new Noticia();
        

        $query = $this->db->conectar()->prepare('SELECT * FROM noticias WHERE id = :id');
        try {
            $query->execute(['id' => $id]);
            while ($row = $query->fetch()) {
                $item->id = $row['id'];
                
                
                $item->id = $id;
                $item->image = $row['image'];
                $item->title = $row['title'];
                $item->description = $row['description'];
                $item->link = $row['link'];
                
            }
            return $item;
        } catch (PDOException $exc) {
            return null;
        }
    }

    public function getByItems($id)
    {
        $item = new Items();
        

        $query = $this->db->conectar()->prepare('SELECT * FROM items WHERE id = :id');
        try {
            $query->execute(['id' => $id]);
            while ($row = $query->fetch()) {
                $item->id = $row['id'];
                
                
                $item->id = $id;
                $item->nombre = $row['nombre'];
                
                
            }
            return $item;
        } catch (PDOException $exc) {
            return null;
        }
    }
    public function getBysubItems($id)
{
    $item = new subitems();

    $query = $this->db->conectar()->prepare('SELECT * FROM subitems WHERE id = :id');
    try {
        $query->execute(['id' => $id]);
        while ($row = $query->fetch()) {
            $item->id = $row['id'];
            $item->nombre = $row['nombre'];
            $item->contenido = $row['contenido'];
            $item->imagen = $row['imagen'];
            $item->enlace = $row['enlace'];
        }
        return $item;
    } catch (PDOException $exc) {
        return null;
    }
}

// Aca comienza la busqueda por id de los ejercicios y sub ejercicio 

public function getByEjercicio($id)
    {
        $item = new Items();
        

        $query = $this->db->conectar()->prepare('SELECT * FROM ejercicio WHERE id = :id');
        try {
            $query->execute(['id' => $id]);
            while ($row = $query->fetch()) {
                $item->id = $row['id'];
                
                
                $item->id = $id;
                $item->nombre = $row['nombre'];
                
                
            }
            return $item;
        } catch (PDOException $exc) {
            return null;
        }
    }
    public function getBysubejercicio($id)
{
    $item = new subitems();

    $query = $this->db->conectar()->prepare('SELECT * FROM subejercicio WHERE id = :id');
    try {
        $query->execute(['id' => $id]);
        while ($row = $query->fetch()) {
            $item->id = $row['id'];
            $item->nombre = $row['nombre'];
            $item->contenido = $row['contenido'];
            $item->imagen = $row['imagen'];
            $item->enlace = $row['enlace'];
        }
        return $item;
    } catch (PDOException $exc) {
        return null;
    }
}
// Aca terminaaa

// Aca comienza la busqueda por id de los Radar y sub Radar 

public function getByRadar($id)
    {
        $item = new Items();
        

        $query = $this->db->conectar()->prepare('SELECT * FROM radar WHERE id = :id');
        try {
            $query->execute(['id' => $id]);
            while ($row = $query->fetch()) {
                $item->id = $row['id'];
                
                
                $item->id = $id;
                $item->nombre = $row['nombre'];
                
                
            }
            return $item;
        } catch (PDOException $exc) {
            return null;
        }
    }
    public function getBysubRadar($id)
{
    $item = new subitems();

    $query = $this->db->conectar()->prepare('SELECT * FROM subradar WHERE id = :id');
    try {
        $query->execute(['id' => $id]);
        while ($row = $query->fetch()) {
            $item->id = $row['id'];
            $item->nombre = $row['nombre'];
            $item->contenido = $row['contenido'];
            $item->imagen = $row['imagen'];
            $item->enlace = $row['enlace'];
        }
        return $item;
    } catch (PDOException $exc) {
        return null;
    }
}
// Aca terminaaa

   // Aca comienza la busqueda por id de los programa y sub programa 

public function getByPrograma($id)
{
    $item = new Items();
    

    $query = $this->db->conectar()->prepare('SELECT * FROM programa WHERE id = :id');
    try {
        $query->execute(['id' => $id]);
        while ($row = $query->fetch()) {
            $item->id = $row['id'];
            
            
            $item->id = $id;
            $item->nombre = $row['nombre'];
            
            
        }
        return $item;
    } catch (PDOException $exc) {
        return null;
    }
}

public function getBysubPrograma($id)
{
$item = new subitems();

$query = $this->db->conectar()->prepare('SELECT * FROM subprograma WHERE id = :id');
try {
    $query->execute(['id' => $id]);
    while ($row = $query->fetch()) {
        $item->id = $row['id'];
        $item->nombre = $row['nombre'];
        $item->contenido = $row['contenido'];
        $item->imagen = $row['imagen'];
        $item->enlace = $row['enlace'];
    }
    return $item;
} catch (PDOException $exc) {
    return null;
}
}
// Aca terminaaa  


    // Aca comienza la busqueda por id de los archivos 

    public function getByArchivos($ID_Archivo)
    {
        $item = new Archivos();
        $query = $this->db->conectar()->prepare('SELECT * FROM archivos WHERE ID_Archivo = :ID_Archivo');
        try {
            $query->execute(['ID_Archivo' => $ID_Archivo]);
            while ($row = $query->fetch()) {
                $item->ID_Archivo = $row['ID_Archivo'];
                $item->Nombre_Archivo = $row['Nombre_Archivo'];
                $item->cedula = $row['cedula'];
                $item->Datos_Archivo = $row['Datos_Archivo'];
                $item->Fecha_Subida = $row['Fecha_Subida'];
            }
            return $item;
        } catch (PDOException $exc) {
            return null;
        }
    }
    
//Aca termina











    public function get_Empleados()
    {
        $filas = [];
        try {
            $query = $this->db->conectar()->query('SELECT * FROM empleado ORDER BY nombre ASC');
            while ($dato = $query->fetch()) {
                $fila = new Empleado();
                $fila->cedula = $dato['cedula'];
                $cargo = 'NO ASIGNADO';
                if ($dato['rol_empleado_id'] == 1) {
                    $cargo = 'ADMINISTRADOR';
                }
                if ($dato['rol_empleado_id'] == 2) {
                    $cargo = 'USUARIO';
                }
                $fila->rol = $cargo /*$dato['rol_empleado_id']*/;
                $fila->nombre = $dato['nombre'];
                $fila->correo = $dato['correo'];
                $fila->apellido = $dato['apellido'];
                $fila->clave = $dato['clave'];

                array_push($filas, $fila);
            }
            return $filas;
        } catch (PDOException $exc) {
            return [];
        }
    }


    
    public function getNoticias()
    {
          $filas = [];
        try {
            // Realiza la consulta SQL para obtener las noticias
            $query = $this->db->conectar()->query('SELECT id, image, title, description, link FROM noticias');
            
            // Itera sobre los resultados y crea objetos de tipo Noticia
            while ($dato = $query->fetch()) {
                $fila = new Noticia();
                $fila->id = $dato['id'];
                $fila->image = $dato['image'];
                $fila->title = $dato['title'];
                $fila->description = $dato['description'];
                $fila->link = $dato['link'];
    
                // Agrega la noticia al array de noticias
                array_push($filas,$fila);
            }
            return $filas;
        } catch (PDOException $ex) {
            // Maneja la excepción en caso de error en la consulta
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

     public function getEstadossubItems()
     {
         $filas = [];
         try {
             $query = $this->db->conectar()->query('SELECT * FROM subitems ORDER BY id DESC');
             while ($dato = $query->fetch()) {
                 $fila = new subitems();
                 $fila->id = $dato['id'];
                 
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

   // Aca comienza para obtener el get de los ejercicios y subejercicios


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

     public function getEstadossubejercicio()
     {
         $filas = [];
         try {
             $query = $this->db->conectar()->query('SELECT * FROM subejercicio ORDER BY id DESC');
             while ($dato = $query->fetch()) {
                 $fila = new subitems();
                 $fila->id = $dato['id'];
                 
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



    // Aca comienza para obtener el get de los radares y subRadres


   public function getEstadosradares()
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

   public function getEstadossubradar()
   {
       $filas = [];
       try {
           $query = $this->db->conectar()->query('SELECT * FROM subradar ORDER BY id DESC');
           while ($dato = $query->fetch()) {
               $fila = new subitems();
               $fila->id = $dato['id'];
               
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


   // Aca comienza para obtener el get de la programacion y subprogramacion


   public function getEstadosprogramas()
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

   public function getEstadossubprograma()
   {
       $filas = [];
       try {
           $query = $this->db->conectar()->query('SELECT * FROM subprograma ORDER BY id DESC');
           while ($dato = $query->fetch()) {
               $fila = new subitems();
               $fila->id = $dato['id'];
               
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


   public function getEstadosArchivos()
   {
       $filas = [];
       try {
           $query = $this->db->conectar()->query('SELECT * FROM Archivos ORDER BY ID_Archivo DESC');
           while ($dato = $query->fetch()) {
               $fila = new Archivos();
               $fila->ID_Archivo = $dato['ID_Archivo'];
               
               $fila->Nombre_Archivo = $dato['Nombre_Archivo'];
               $fila->cedula = $dato['cedula'];
               $fila->Datos_Archivo = $dato['Datos_Archivo'];
               $fila->Fecha_Subida = $dato['Fecha_Subida'];
               array_push($filas, $fila);
           }
           return $filas;
       } catch (PDOException $exc) {
           return [];
       }
   }

   public function getComentariosPorUsuario($cedula)
{
    $filas = [];
    $query = $this->db->conectar()->prepare('SELECT * FROM comentarios WHERE cedula = :cedula ORDER BY ID_Comentario DESC');
    try {
        $query->execute(['cedula' => $cedula]);
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

   
    
    


    
    


    

   
    


    



}