<?php

class Consultar extends Controlador
{

    function __construct()
    {
        parent::__construct();
        $this->vista->titulo = "CONSULTAR";
        $this->vista->mensaje = "";
        $this->vista->alerta = "";
        $this->vista->empleados = [];
        $this->vista->noticias = [];
        $this->vista->Items = [];
       
        
    }

    function eliminarArchivos($param = null)
    {
        session_start();
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] == 3) {
            header('location: ' . constant('URL') . 'Login');
        } else {
            $ID_Archivo = $param[0];
            if (
                $this->modelo->eliminarArchivos(['ID_Archivo' => $ID_Archivo])
            ) {
                $this->vista->aviso = "Eliminar Algun Archivo";
                $this->vista->alerta = 'alert alert-success';
                $this->vista->mensaje = 'Archivo ELIMINADO CON ÉXITO';
                $Items = $this->modelo->getEstadosArchivos();
                $this->vista->Items = $Items;
                $this->vista->cargar('admin/consultar/Archivos');
            }else{
                $this->vista->aviso = "CONSULTA DE ITEMS";
                $this->vista->alerta = 'alert alert-danger';
                $this->vista->mensaje = 'ERROR AL ELIMINAR EL EMPLEADO';
                $Items = $this->modelo->getEstadosArchivos();
                $this->vista->Items = $Items;
                $this->vista->cargar('admin/consultar/Archivos');
            }
        }
    }

    function eliminarEmpleado($param = null)
    {
        session_start();
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] == 3) {
            header('location: ' . constant('URL') . 'Login');
        } else {
            $cedulaEmpleado = $param[0];
            if (
                $this->modelo->eliminarEmpleadoTotal(['cedula' => $cedulaEmpleado])
            ) {
                $this->vista->aviso = "CONSULTA DE EMPLEADOS";
                $this->vista->alerta = 'alert alert-success';
                $this->vista->mensaje = 'EMPLEADO ELIMINADO CON ÉXITO';
                $empleados = $this->modelo->get_Empleados();
                $this->vista->empleados = $empleados;
                $this->vista->cargar('admin/consultar/empleado');
            }else{
                $this->vista->aviso = "CONSULTA DE EMPLEADOS";
                $this->vista->alerta = 'alert alert-danger';
                $this->vista->mensaje = 'ERROR AL ELIMINAR EL EMPLEADO';
                $empleados = $this->modelo->get_Empleados();
                $this->vista->empleados = $empleados;
                $this->vista->cargar('admin/consultar/empleado');
            }
        }
    }
    
    function eliminarItems($param = null)
    {
        session_start();
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] == 3) {
            header('location: ' . constant('URL') . 'Login');
        } else {
            $id = $param[0];
            if (
                $this->modelo->eliminarItems(['id' => $id])
            ) {
                $this->vista->aviso = "CONSULTA DE Items";
                $this->vista->alerta = 'alert alert-success';
                $this->vista->mensaje = 'Items ELIMINADO CON ÉXITO';
                $Items = $this->modelo->getEstadosItem();
                $this->vista->Items = $Items;
                $this->vista->cargar('admin/consultar/Items');
            }else{
                $this->vista->aviso = "CONSULTA DE ITEMS";
                $this->vista->alerta = 'alert alert-danger';
                $this->vista->mensaje = 'ERROR AL ELIMINAR EL EMPLEADO';
                $Items = $this->modelo->getEstadosItem();
                $this->vista->Items = $Items;
                $this->vista->cargar('admin/consultar/Items');
            }
        }
    }
    
    function eliminarsubItems($param = null)
    {
        session_start();
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] == 3) {
            header('location: ' . constant('URL') . 'Login');
        } else {
            $id = $param[0];
            if (
                $this->modelo->eliminarsubItems(['id' => $id])
            ) {
                $this->vista->aviso = "CONSULTA DE SUBITEMS";
                $this->vista->alerta = 'alert alert-success';
                $this->vista->mensaje = 'SubItems ELIMINADO CON ÉXITO';
                $Items = $this->modelo->getEstadossubItems();
                $this->vista->Items = $Items;
                $this->vista->cargar('admin/consultar/subitems');
            }else{
                $this->vista->aviso = "CONSULTA DE Subitems";
                $this->vista->alerta = 'alert alert-danger';
                $this->vista->mensaje = 'ERROR AL ELIMINAR EL EMPLEADO';
                $Items = $this->modelo->getEstadossubItems();
                $this->vista->Items = $Items;
                $this->vista->cargar('admin/consultar/subitems');
            }
        }
    }
    //Aca comienza para eliminarr ejercicio  y sub ejercicio
    function eliminarEjercicios($param = null)
    {
        session_start();
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] == 3) {
            header('location: ' . constant('URL') . 'Login');
        } else {
            $id = $param[0];
            if (
                $this->modelo->eliminarEjercicios(['id' => $id])
            ) {
                $this->vista->aviso = "CONSULTA DE Items";
                $this->vista->alerta = 'alert alert-success';
                $this->vista->mensaje = 'ejercicio ELIMINADO CON ÉXITO';
                $Items = $this->modelo->getEstadosEjercicios();
                $this->vista->Items = $Items;
                $this->vista->cargar('admin/consultar/ejercicios');
            }else{
                $this->vista->aviso = "CONSULTA DE ITEMS";
                $this->vista->alerta = 'alert alert-danger';
                $this->vista->mensaje = 'ERROR AL ELIMINAR EL ejercicio';
                $Items = $this->modelo->getEstadosEjercicios();
                $this->vista->Items = $Items;
                $this->vista->cargar('admin/consultar/ejercicios');
            }
        }
    }

    function eliminarsubEjercicios($param = null)
    {
        session_start();
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] == 3) {
            header('location: ' . constant('URL') . 'Login');
        } else {
            $id = $param[0];
            if (
                $this->modelo->eliminarsubEjercicios(['id' => $id])
            ) {
                $this->vista->aviso = "CONSULTA DE SUBITEMS";
                $this->vista->alerta = 'alert alert-success';
                $this->vista->mensaje = 'SubItems ELIMINADO CON ÉXITO';
                $Items = $this->modelo->getEstadossubejercicio();
                $this->vista->Items = $Items;
                $this->vista->cargar('admin/consultar/subejercicio');
            }else{
                $this->vista->aviso = "CONSULTA DE Subitems";
                $this->vista->alerta = 'alert alert-danger';
                $this->vista->mensaje = 'ERROR AL ELIMINAR EL EMPLEADO';
                $Items = $this->modelo->getEstadossubejercicio();
                $this->vista->Items = $Items;
                $this->vista->cargar('admin/consultar/subejercicio');
            }
        }
    }




    //Aca termina
    
  //Aca comienza para eliminarr radar  y sub radar
  function eliminarRadares($param = null)
  {
      session_start();
      if (!isset($_SESSION['rol']) || $_SESSION['rol'] == 3) {
          header('location: ' . constant('URL') . 'Login');
      } else {
          $id = $param[0];
          if (
              $this->modelo->eliminarRadares(['id' => $id])
          ) {
              $this->vista->aviso = "CONSULTA DE Radar";
              $this->vista->alerta = 'alert alert-success';
              $this->vista->mensaje = 'Radar ELIMINADO CON ÉXITO';
              $Items = $this->modelo->getEstadosradares();
              $this->vista->Items = $Items;
              $this->vista->cargar('admin/consultar/Radar');
          }else{
              $this->vista->aviso = "CONSULTA DE Radar";
              $this->vista->alerta = 'alert alert-danger';
              $this->vista->mensaje = 'ERROR AL ELIMINAR EL Radar';
              $Items = $this->modelo->getEstadosradares();
              $this->vista->Items = $Items;
              $this->vista->cargar('admin/consultar/Radar');
          }
      }
  }

  function eliminarsubradares($param = null)
  {
      session_start();
      if (!isset($_SESSION['rol']) || $_SESSION['rol'] == 3) {
          header('location: ' . constant('URL') . 'Login');
      } else {
          $id = $param[0];
          if (
              $this->modelo->eliminarsubradares(['id' => $id])
          ) {
              $this->vista->aviso = "CONSULTA DE SUBITEMS";
              $this->vista->alerta = 'alert alert-success';
              $this->vista->mensaje = 'SubItems ELIMINADO CON ÉXITO';
              $Items = $this->modelo->getEstadossubradar();
              $this->vista->Items = $Items;
              $this->vista->cargar('admin/consultar/subradar');
          }else{
              $this->vista->aviso = "CONSULTA DE Subitems";
              $this->vista->alerta = 'alert alert-danger';
              $this->vista->mensaje = 'ERROR AL ELIMINAR EL EMPLEADO';
              $Items = $this->modelo->getEstadossubradar();
              $this->vista->Items = $Items;
              $this->vista->cargar('admin/consultar/subradar');
          }
      }
  }




  //Aca termina






  //Aca comienza para eliminarr Programa  y sub Programa
  function eliminarProgramas($param = null)
  {
      session_start();
      if (!isset($_SESSION['rol']) || $_SESSION['rol'] == 3) {
          header('location: ' . constant('URL') . 'Login');
      } else {
          $id = $param[0];
          if (
              $this->modelo->eliminarProgramas(['id' => $id])
          ) {
              $this->vista->aviso = "CONSULTA DE Radar";
              $this->vista->alerta = 'alert alert-success';
              $this->vista->mensaje = 'Programa ELIMINADO CON ÉXITO';
              $Items = $this->modelo->getEstadosprogramas();
              $this->vista->Items = $Items;
              $this->vista->cargar('admin/consultar/Programa');
          }else{
              $this->vista->aviso = "CONSULTA DE Radar";
              $this->vista->alerta = 'alert alert-danger';
              $this->vista->mensaje = 'ERROR AL ELIMINAR EL Programa';
              $Items = $this->modelo->getEstadosprogramas();
              $this->vista->Items = $Items;
              $this->vista->cargar('admin/consultar/Programa');
          }
      }
  }

  function eliminarsubprograma($param = null)
  {
      session_start();
      if (!isset($_SESSION['rol']) || $_SESSION['rol'] == 3) {
          header('location: ' . constant('URL') . 'Login');
      } else {
          $id = $param[0];
          if (
              $this->modelo->eliminarsubprograma(['id' => $id])
          ) {
              $this->vista->aviso = "CONSULTA DE SUBITEMS";
              $this->vista->alerta = 'alert alert-success';
              $this->vista->mensaje = 'SubPrograma ELIMINADO CON ÉXITO';
              $Items = $this->modelo->getEstadossubprograma();
              $this->vista->Items = $Items;
              $this->vista->cargar('admin/consultar/subPrograma');
          }else{
              $this->vista->aviso = "CONSULTA DE Subitems";
              $this->vista->alerta = 'alert alert-danger';
              $this->vista->mensaje = 'ERROR AL ELIMINAR EL EMPLEADO';
              $Items = $this->modelo->getEstadossubprograma();
              $this->vista->Items = $Items;
              $this->vista->cargar('admin/consultar/subPrograma');
          }
      }
  }




  //Aca termina







    function verEmpleado($param = null)
    {
        session_start();
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] == 3) {
            header('location: ' . constant('URL') . 'Login');
        } else {
            $cedulaEmpleado = $param[0];
            $empleado = $this->modelo->getByIdEmpleado($cedulaEmpleado); //modifica getbyid

            //session_start();
            $_SESSION['cedula_verEmpleado'] = $empleado->cedula;
            $this->vista->empleado = $empleado;

            $opcEstado = $this->modelo->getEstadoEmpleado();
            $this->vista->opcEstado = $opcEstado;

            $opcNumeros = $this->modelo->getNumerosEmpleado($cedulaEmpleado);
            $this->vista->opcNumeros = $opcNumeros;

            $this->vista->aviso = "Detalle de empleado: " . $empleado->nombre . " " . $empleado->apellido;
            $this->vista->mensaje = "";
            $this->vista->cargar('admin/consultar/detalleEmpleado');
        }
    }
    function verNoticia($param = null)
    {
        session_start();
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] == 3) {
            header('location: ' . constant('URL') . 'Login');
        } else {
            $id = $param[0];
            $noticias = $this->modelo->getByIdNoticias($id); //modifica getbyid

            //session_start();
            
            $this->vista->noticias = $noticias;


            $this->vista->aviso = "Detalle de noticia: " . $noticias->title ;
            $this->vista->mensaje = "";
            $this->vista->cargar('admin/consultar/detalleNoticia');
        }
    }
    

    function eliminarNumeroEmpleado($param = null)
    {
        session_start();
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] == 3) {
            header('location: ' . constant('URL') . 'Login');
        } else {

            $cedula = $param[0];
            $numero = $param[1];
            if (
                $this->modelo->eliminarNumeroEmpleado([
                    'cedula' => $cedula,
                    'telefono' => $numero
                ])
            ) {
                $empleado = $this->modelo->getByIdEmpleado($cedula); //modifica getbyid

                //session_start();
                $_SESSION['cedula_verEmpleado'] = $empleado->cedula;
                $this->vista->empleado = $empleado;

                $opcEstado = $this->modelo->getEstadoEmpleado();
                $this->vista->opcEstado = $opcEstado;

                $opcNumeros = $this->modelo->getNumerosEmpleado($cedula);
                $this->vista->opcNumeros = $opcNumeros;
                $this->vista->alerta = "alert alert-success";
                $this->vista->mensaje = "SE ELIMINÓ EL NÚMERO";
            } else {
                $this->vista->alerta = "alert alert-danger";
                $this->vista->mensaje = "NO SE PUEDE ELIMINAR EL NUMERO DE CELULAR";
            }

            $this->vista->aviso = "Detalle de empleado: " . $empleado->nombre . " " . $empleado->apellido;
            //$this->vista->mensaje = "entró a eliminar el número del empleado: numero(" . $numero . "), cédula(" . $cedula . ")";
            $this->vista->cargar('admin/consultar/detalleEmpleado');
        }
    }
    
    

    function actualizarEmpleado()
    {
        session_start();
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] == 3) {
            header('location: ' . constant('URL') . 'Login');
        } else {

            $cedula = $_POST['cedula'];
            $estado = $_POST['estado'];
            $apellido = $_POST['apellido'];
            $nombre = $_POST['nombre'];
            $correo = $_POST['correo'];
            if (
                $this->modelo->actualizarEmpleado([
                    'cedula' => $cedula,
                    'estado' => $estado,
                    'apellido' => $apellido,
                    'nombre' => $nombre,
                    'correo' => $correo
                ])
            ) {
                if (isset($_POST['telefonoNuevo'])) {
                    $telefonos = $_POST['telefonoNuevo'];
                    foreach ($telefonos as $telefono) {
                        // Aquí puedes realizar las operaciones necesarias, como guardar en una base de datos, enviar por correo electrónico, etc.
                        $this->modelo->insertarCelularEmpleado([
                            'cedula' => $cedula,
                            'telefono' => $telefono
                        ]);
                    }
                }

                $empleado = new Empleado();
                $empleado->cedula = $cedula;
                $empleado->rol = $estado;
                $empleado->apellido = $apellido;
                $empleado->nombre = $nombre;
                $empleado->correo = $correo;
                $cargo = 'NO ASIGNADO';
                if ($empleado->rol == 1) {
                    $cargo = 'GERENTE';
                }
                if ($empleado->rol == 2) {
                    $cargo = 'VENTAS';
                }
                $empleado->cargo = $cargo;

                $opcEstado = $this->modelo->getEstadoEmpleado();
                $this->vista->opcEstado = $opcEstado;

                $opcNumeros = $this->modelo->getNumerosEmpleado($cedula);
                $this->vista->opcNumeros = $opcNumeros;

                $this->vista->empleado = $empleado;
                $this->vista->alerta = "alert alert-success";
                $this->vista->mensaje = "EMPLEADO ACTUALIZADO CORRECTAMENTE";
            } else {
                //Mensaje de error            
                $this->vista->alerta = "alert alert-danger";
                $this->vista->mensaje = "NO SE PUEDE ACTUALIZAR SECRETARIO/A";
            }
            $this->vista->aviso = "Detalle de empleado: " . $empleado->nombre . " " . $empleado->apellido;
            //$this->vista->mensaje = $cedula . " " . $nombre . " " . $apellido . " " . $estado . " " . $correo;
            $this->vista->cargar('admin/consultar/detalleEmpleado');
        }
    }

    function actualizarNoticia()
    {
        session_start();
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] == 3) {
            header('location: ' . constant('URL') . 'Login');
        } else {
            

            $id = $_POST['id'];
            $image = $_POST['image'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $link = $_POST['link'];
            if ($this->modelo->actualizarNoticia([
                'id' => $id,
                'image' => $image,
                'title' => $title,
                'description' => $description,
                'link' => $link,
            ])) { // Agregado operador de comparación
    
                $noticias = new Noticia(); // Agregada la palabra clave 'new'
                $noticias->id = $id;
                $noticias->image = $image;
                $noticias->title = $title;
                $noticias->description = $description;
                $noticias->link = $link;
    
                

            

              

                $this->vista->noticias = $noticias;
                $this->vista->alerta = "alert alert-success";
                $this->vista->mensaje = "EMPLEADO ACTUALIZADO CORRECTAMENTE";
            } else {
                //Mensaje de error            
                $this->vista->alerta = "alert alert-danger";
                $this->vista->mensaje = "NO SE PUEDE ACTUALIZAR SECRETARIO/A";
            }
            $this->vista->aviso = "Detalle de empleado: " . $noticias->title ;
            //$this->vista->mensaje = $cedula . " " . $nombre . " " . $apellido . " " . $estado . " " . $correo;
            $this->vista->cargar('admin/consultar/detalleNoticia');
        }
    }
    
    
    



    function cargarEmpleado()
    {
        session_start();
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] == 3) {
            header('location: ' . constant('URL') . 'Login');
        } else {
            $this->vista->aviso = "CONSULTA DE EMPLEADOS";
            $empleados = $this->modelo->get_Empleados();
            $this->vista->empleados = $empleados;
            $this->vista->cargar('admin/consultar/empleado');
        }
    }

    function palabraClave()
    {
        session_start();
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] == 3) {
            header('location: ' . constant('URL') . 'Login');
        } else {
            $keyword = $_POST['palabraClave'];
            $this->vista->aviso = "CONSULTA DE EMPLEADOS";
            $palabra = $this->modelo->get_PalabraClave($keyword);
            $this->vista->empleados = $palabra;
            //$this->vista->alertar = 'alert alert-warning';
            //$this->vista->mensaje = $palabra;
            $this->vista->cargar('admin/consultar/empleado');
        }
    }
   function CargarNoticias(){
            session_start();
            if (!isset($_SESSION['rol']) || $_SESSION['rol'] == 3) {
                header('location: ' . constant('URL') . 'Login');
            } else {
                $this->vista->aviso = "CONSULTA DE NOTICIAS";
                $noticias = $this->modelo->getNoticias();
                $this->vista->noticias = $noticias;
                $this->vista->cargar('admin/consultar/Notici');
            }
    }
    
    function CargarItems(){
        session_start();
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] == 3) {
            header('location: ' . constant('URL') . 'Login');
        } else {
            $this->vista->aviso = "CONSULTA DE Items";
            $Items = $this->modelo->getEstadosItem();
            $this->vista->Items = $Items;
            $this->vista->cargar('admin/consultar/Items');
        }
    }

    function Cargarsubitems(){
        session_start();
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] == 3) {
            header('location: ' . constant('URL') . 'Login');
        } else {
            $this->vista->aviso = "CONSULTA DE Items";
            $Items = $this->modelo->getEstadossubItems();
            $this->vista->Items = $Items;
            $this->vista->cargar('admin/consultar/subitems');
        }
    }
    //Cargar Ejercicicios y sub ejercicios
    /// ****
    function CargarEjercicio(){
        session_start();
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] == 3) {
            header('location: ' . constant('URL') . 'Login');
        } else {
            $this->vista->aviso = "CONSULTA DE Ejercicio";
            $Items = $this->modelo->getEstadosEjercicios();
            $this->vista->Items = $Items;
            $this->vista->cargar('admin/consultar/ejercicios');
        }
    }

    function CargarsubEjercicio(){
        session_start();
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] == 3) {
            header('location: ' . constant('URL') . 'Login');
        } else {
            $this->vista->aviso = "CONSULTA DE Items";
            $Items = $this->modelo->getEstadossubejercicio();
            $this->vista->Items = $Items;
            $this->vista->cargar('admin/consultar/subejercicio');
        }
    }

    //termina

  //Cargar radar y sub radar
    /// ****
    function CargarRadar(){
        session_start();
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] == 3) {
            header('location: ' . constant('URL') . 'Login');
        } else {
            $this->vista->aviso = "CONSULTA DE Ejercicio";
            $Items = $this->modelo->getEstadosradares();
            $this->vista->Items = $Items;
            $this->vista->cargar('admin/consultar/Radar');
        }
    }

    function CargarsubRadar(){
        session_start();
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] == 3) {
            header('location: ' . constant('URL') . 'Login');
        } else {
            $this->vista->aviso = "CONSULTA DE Items";
            $Items = $this->modelo->getEstadossubradar();
            $this->vista->Items = $Items;
            $this->vista->cargar('admin/consultar/subradar');
        }
    }

    //termina

   

    //Cargar Programa y sub Programa
    /// ****
    function CargarPrograma(){
        session_start();
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] == 3) {
            header('location: ' . constant('URL') . 'Login');
        } else {
            $this->vista->aviso = "CONSULTA DE Ejercicio";
            $Items = $this->modelo->getEstadosprogramas();
            $this->vista->Items = $Items;
            $this->vista->cargar('admin/consultar/Programa');
        }
    }

    function CargarsubPrograma(){
        session_start();
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] == 3) {
            header('location: ' . constant('URL') . 'Login');
        } else {
            $this->vista->aviso = "CONSULTA DE Items";
            $Items = $this->modelo->getEstadossubprograma();
            $this->vista->Items = $Items;
            $this->vista->cargar('admin/consultar/subPrograma');
        }
    }

    //termina

  //Cargar ARCHIVO 
    /// ****
    function CargarArchivo(){
        session_start();
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] == 3) {
            header('location: ' . constant('URL') . 'Login');
        } else {
            $this->vista->aviso = "CONSULTA DE Ejercicio";
            $Items = $this->modelo->getEstadosArchivos();
            $this->vista->Items = $Items;
            $this->vista->cargar('admin/consultar/Archivos');
        }
    }

//ACA TERMINAR
 //Cargar Comentario 
    /// ****
    
    function cargarComentarios() {
        session_start();
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] == 3) {
            header('location: ' . constant('URL') . 'Login');
        } else {
            // Añade una línea de depuración
             // Esto imprimirá el contenido de $_SESSION
    
            // Obtiene la cédula del usuario actual desde $_SESSION
            $cedula = $_SESSION['cedulaEmpleado']; // Asegúrate de que la cédula del usuario se almacena en la sesión
                
            // Obtén los comentarios del usuario actual
            $this->vista->aviso = "CONSULTA DE Comentarios";
            $Items = $this->modelo->getComentariosPorUsuario($cedula);
            $this->vista->Items = $Items;
            $this->vista->cargar('usuarios/consultar/comentarios');
        }
    }
    
    
    
    
    
    
    
    

//ACA TERMINAR  



    
    function verItem($param = null)
    {
        session_start();
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] == 3) {
            header('location: ' . constant('URL') . 'Login');
        } else {
            $id = $param[0];
            $Items = $this->modelo->getByItems($id); //modifica getbyid

            //session_start();
            
            $this->vista->Items = $Items;


            $this->vista->aviso = "Detalle Items: " . $Items->nombre ;
            $this->vista->mensaje = "";
            $this->vista->cargar('admin/consultar/detalleItem');
        }
    }

    function versubItems($param = null)
    {
        session_start();
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] == 3) {
            header('location: ' . constant('URL') . 'Login');
        } else {
            $id = $param[0];
            $Items = $this->modelo->getBysubItems($id); //modifica getbyid

            //session_start();
            
            $this->vista->Items = $Items;


            $this->vista->aviso = "Detalle Items: " . $Items->id ;
            $this->vista->mensaje = "";
            $this->vista->cargar('admin/consultar/detallesubitems');
        }
    }
    
    function actualizarItems()
    {
        session_start();
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] == 3) {
            header('location: ' . constant('URL') . 'Login');
        } else {
            

            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            if ($this->modelo->actualizarItems([
                'id' => $id,
                'nombre' => $nombre,
                
            ])) { // Agregado operador de comparación
    
                $Items = new Items(); // Agregada la palabra clave 'new'
                $Items->id = $id;
                $Items->nombre = $nombre;
                
    
                

            

              

                $this->vista->Items = $Items;
                $this->vista->alerta = "alert alert-success";
                $this->vista->mensaje = "Items ACTUALIZADO CORRECTAMENTE";
            } else {
                //Mensaje de error            
                $this->vista->alerta = "alert alert-danger";
                $this->vista->mensaje = "NO SE PUEDE ACTUALIZAR Items/A";
            }
            $this->vista->aviso = "Detalle de empleado: " . $Items->nombre ;
            //$this->vista->mensaje = $cedula . " " . $nombre . " " . $apellido . " " . $estado . " " . $correo;
            $this->vista->cargar('admin/consultar/detalleItem');
        }
    }
    function actualizarsubItems()
    {
        session_start();
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] == 3) {
            header('location: ' . constant('URL') . 'Login');
        } else {
            

            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $contenido = $_POST['contenido'];
            $imagen = $_POST['imagen'];
            $enlace = $_POST['enlace'];
            if ($this->modelo->actualizarsubItems([
                'id' => $id,
                'nombre' => $nombre,
                'contenido' => $contenido,
                'imagen' => $imagen,
                'enlace' => $enlace,
                
            ])) { // Agregado operador de comparación
    
                $Items = new subitems(); // Agregada la palabra clave 'new'
                $Items->id = $id;
                $Items->nombre = $nombre;
                $Items->contenido = $contenido;
                $Items->imagen = $imagen;
                $Items->enlace = $enlace;
                
    
                

            

              

                $this->vista->Items = $Items;
                $this->vista->alerta = "alert alert-success";
                $this->vista->mensaje = "SubItems ACTUALIZADO CORRECTAMENTE";
            } else {
                //Mensaje de error            
                $this->vista->alerta = "alert alert-danger";
                $this->vista->mensaje = "NO SE PUEDE ACTUALIZAR Items/A";
            }
            $this->vista->aviso = "Detalle de empleado: " . $Items->id ;
            //$this->vista->mensaje = $cedula . " " . $nombre . " " . $apellido . " " . $estado . " " . $correo;
            $this->vista->cargar('admin/consultar/detallesubitems');
        }
    }


    // Aca comienza Ver ejercicio y subejercicio 
    //************************************ */

    function verEjercicio($param = null)
    {
        session_start();
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] == 3) {
            header('location: ' . constant('URL') . 'Login');
        } else {
            $id = $param[0];
            $Items = $this->modelo->getByEjercicio($id); //modifica getbyid

            //session_start();
            
            $this->vista->Items = $Items;


            $this->vista->aviso = "Detalle Ejercicio: " . $Items->nombre ;
            $this->vista->mensaje = "";
            $this->vista->cargar('admin/consultar/detalleEjercicio');
        }
    }

    function versubejercicios($param = null)
    {
        session_start();
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] == 3) {
            header('location: ' . constant('URL') . 'Login');
        } else {
            $id = $param[0];
            $Items = $this->modelo->getBysubejercicio($id); //modifica getbyid

            //session_start();
            
            $this->vista->Items = $Items;


            $this->vista->aviso = "Detalle sub ejercicios: " . $Items->id ;
            $this->vista->mensaje = "";
            $this->vista->cargar('admin/consultar/detallesubejercicio');
        }
    }
    
    function actualizarEjercicio()
    {
        session_start();
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] == 3) {
            header('location: ' . constant('URL') . 'Login');
        } else {
            

            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            if ($this->modelo->actualizarEjercicio([
                'id' => $id,
                'nombre' => $nombre,
                
            ])) { // Agregado operador de comparación
    
                $Items = new Items(); // Agregada la palabra clave 'new'
                $Items->id = $id;
                $Items->nombre = $nombre;
                
    
                

            

              

                $this->vista->Items = $Items;
                $this->vista->alerta = "alert alert-success";
                $this->vista->mensaje = "Ejercicio ACTUALIZADO CORRECTAMENTE";
            } else {
                //Mensaje de error            
                $this->vista->alerta = "alert alert-danger";
                $this->vista->mensaje = "NO SE PUEDE ACTUALIZAR Items/A";
            }
            $this->vista->aviso = "Detalle de empleado: " . $Items->nombre ;
            //$this->vista->mensaje = $cedula . " " . $nombre . " " . $apellido . " " . $estado . " " . $correo;
            $this->vista->cargar('admin/consultar/detalleEjercicio');
        }
    }
    function actualizarsubejercicio()
    {
        session_start();
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] == 3) {
            header('location: ' . constant('URL') . 'Login');
        } else {
            

            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $contenido = $_POST['contenido'];
            $imagen = $_POST['imagen'];
            $enlace = $_POST['enlace'];
            if ($this->modelo->actualizarsubejercicio([
                'id' => $id,
                'nombre' => $nombre,
                'contenido' => $contenido,
                'imagen' => $imagen,
                'enlace' => $enlace,
                
            ])) { // Agregado operador de comparación
    
                $Items = new subitems(); // Agregada la palabra clave 'new'
                $Items->id = $id;
                $Items->nombre = $nombre;
                $Items->contenido = $contenido;
                $Items->imagen = $imagen;
                $Items->enlace = $enlace;
                
    
                

            

              

                $this->vista->Items = $Items;
                $this->vista->alerta = "alert alert-success";
                $this->vista->mensaje = "SubEjercicio ACTUALIZADO CORRECTAMENTE";
            } else {
                //Mensaje de error            
                $this->vista->alerta = "alert alert-danger";
                $this->vista->mensaje = "NO SE PUEDE ACTUALIZAR Items/A";
            }
            $this->vista->aviso = "Detalle de empleado: " . $Items->id ;
            //$this->vista->mensaje = $cedula . " " . $nombre . " " . $apellido . " " . $estado . " " . $correo;
            $this->vista->cargar('admin/consultar/detallesubejercicio');
        }
    }






    // Aca comienza Ver Radar y sub Radar 
    //************************************ */

    function verRadar($param = null)
    {
        session_start();
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] == 3) {
            header('location: ' . constant('URL') . 'Login');
        } else {
            $id = $param[0];
            $Items = $this->modelo->getByRadar($id); //modifica getbyid

            //session_start();
            
            $this->vista->Items = $Items;


            $this->vista->aviso = "Detalle Radar: " . $Items->nombre ;
            $this->vista->mensaje = "";
            $this->vista->cargar('admin/consultar/detalleRadar');
        }
    }

    function versubRadares($param = null)
    {
        session_start();
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] == 3) {
            header('location: ' . constant('URL') . 'Login');
        } else {
            $id = $param[0];
            $Items = $this->modelo->getBysubRadar($id); //modifica getbyid

            //session_start();
            
            $this->vista->Items = $Items;


            $this->vista->aviso = "Detalle sub Radar: " . $Items->id ;
            $this->vista->mensaje = "";
            $this->vista->cargar('admin/consultar/detallesubRadar');
        }
    }
    
    function actualizarRadar()
    {
        session_start();
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] == 3) {
            header('location: ' . constant('URL') . 'Login');
        } else {
            

            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            if ($this->modelo->actualizarRadar([
                'id' => $id,
                'nombre' => $nombre,
                
            ])) { // Agregado operador de comparación
    
                $Items = new Items(); // Agregada la palabra clave 'new'
                $Items->id = $id;
                $Items->nombre = $nombre;
                
    
                

            

              

                $this->vista->Items = $Items;
                $this->vista->alerta = "alert alert-success";
                $this->vista->mensaje = "Radar ACTUALIZADO CORRECTAMENTE";
            } else {
                //Mensaje de error            
                $this->vista->alerta = "alert alert-danger";
                $this->vista->mensaje = "NO SE PUEDE ACTUALIZAR Items/A";
            }
            $this->vista->aviso = "Detalle de Radar: " . $Items->nombre ;
            //$this->vista->mensaje = $cedula . " " . $nombre . " " . $apellido . " " . $estado . " " . $correo;
            $this->vista->cargar('admin/consultar/detalleRadar');
        }
    }
    function actualizarsubRadar()
    {
        session_start();
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] == 3) {
            header('location: ' . constant('URL') . 'Login');
        } else {
            

            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $contenido = $_POST['contenido'];
            $imagen = $_POST['imagen'];
            $enlace = $_POST['enlace'];
            if ($this->modelo->actualizarsubRadar([
                'id' => $id,
                'nombre' => $nombre,
                'contenido' => $contenido,
                'imagen' => $imagen,
                'enlace' => $enlace,
                
            ])) { // Agregado operador de comparación
    
                $Items = new subitems(); // Agregada la palabra clave 'new'
                $Items->id = $id;
                $Items->nombre = $nombre;
                $Items->contenido = $contenido;
                $Items->imagen = $imagen;
                $Items->enlace = $enlace;
                
    
                

            

              

                $this->vista->Items = $Items;
                $this->vista->alerta = "alert alert-success";
                $this->vista->mensaje = "subradar ACTUALIZADO CORRECTAMENTE";
            } else {
                //Mensaje de error            
                $this->vista->alerta = "alert alert-danger";
                $this->vista->mensaje = "NO SE PUEDE ACTUALIZAR Items/A";
            }
            $this->vista->aviso = "Detalle de empleado: " . $Items->id ;
            //$this->vista->mensaje = $cedula . " " . $nombre . " " . $apellido . " " . $estado . " " . $correo;
            $this->vista->cargar('admin/consultar/detallesubRadar');
        }
    }
    

    
   

    // Aca comienza Ver Programa y sub Programa 
    //************************************ */

    function verPrograma($param = null)
    {
        session_start();
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] == 3) {
            header('location: ' . constant('URL') . 'Login');
        } else {
            $id = $param[0];
            $Items = $this->modelo->getByPrograma($id); //modifica getbyid

            //session_start();
            
            $this->vista->Items = $Items;


            $this->vista->aviso = "Detalle Radar: " . $Items->nombre ;
            $this->vista->mensaje = "";
            $this->vista->cargar('admin/consultar/detallePrograma');
        }
    }

    function versubPrograma($param = null)
    {
        session_start();
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] == 3) {
            header('location: ' . constant('URL') . 'Login');
        } else {
            $id = $param[0];
            $Items = $this->modelo->getBysubPrograma($id); //modifica getbyid

            //session_start();
            
            $this->vista->Items = $Items;


            $this->vista->aviso = "Detalle sub Radar: " . $Items->id ;
            $this->vista->mensaje = "";
            $this->vista->cargar('admin/consultar/detallesubPrograma');
        }
    }
    
    function actualizarPrograma()
    {
        session_start();
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] == 3) {
            header('location: ' . constant('URL') . 'Login');
        } else {
            

            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            if ($this->modelo->actualizarPrograma([
                'id' => $id,
                'nombre' => $nombre,
                
            ])) { // Agregado operador de comparación
    
                $Items = new Items(); // Agregada la palabra clave 'new'
                $Items->id = $id;
                $Items->nombre = $nombre;
                
    
                

            

              

                $this->vista->Items = $Items;
                $this->vista->alerta = "alert alert-success";
                $this->vista->mensaje = "Programaciòn ACTUALIZADO CORRECTAMENTE";
            } else {
                //Mensaje de error            
                $this->vista->alerta = "alert alert-danger";
                $this->vista->mensaje = "NO SE PUEDE ACTUALIZAR Items/A";
            }
            $this->vista->aviso = "Detalle de Radar: " . $Items->nombre ;
            //$this->vista->mensaje = $cedula . " " . $nombre . " " . $apellido . " " . $estado . " " . $correo;
            $this->vista->cargar('admin/consultar/detallePrograma');
        }
    }
    function actualizarsubPrograma()
    {
        session_start();
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] == 3) {
            header('location: ' . constant('URL') . 'Login');
        } else {
            

            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $contenido = $_POST['contenido'];
            $imagen = $_POST['imagen'];
            $enlace = $_POST['enlace'];
            if ($this->modelo->actualizarsubPrograma([
                'id' => $id,
                'nombre' => $nombre,
                'contenido' => $contenido,
                'imagen' => $imagen,
                'enlace' => $enlace,
                
            ])) { // Agregado operador de comparación
    
                $Items = new subitems(); // Agregada la palabra clave 'new'
                $Items->id = $id;
                $Items->nombre = $nombre;
                $Items->contenido = $contenido;
                $Items->imagen = $imagen;
                $Items->enlace = $enlace;
                
    
                

            

              

                $this->vista->Items = $Items;
                $this->vista->alerta = "alert alert-success";
                $this->vista->mensaje = "subProgramacion ACTUALIZADO CORRECTAMENTE";
            } else {
                //Mensaje de error            
                $this->vista->alerta = "alert alert-danger";
                $this->vista->mensaje = "NO SE PUEDE ACTUALIZAR Items/A";
            }
            $this->vista->aviso = "Detalle de empleado: " . $Items->id ;
            //$this->vista->mensaje = $cedula . " " . $nombre . " " . $apellido . " " . $estado . " " . $correo;
            $this->vista->cargar('admin/consultar/detallesubPrograma');
        }
    }
 ///// Aca comienza para ver Archivos
 
 public function descargarArchivo($param = null)
 {   

    session_start();
     if (!isset($_SESSION['rol']) || $_SESSION['rol'] == 3) {
        header('location: ' . constant('URL') . 'Login');
     }
     $ID_Archivo = $param[0];
     $Items = $this->modelo->getByArchivos($ID_Archivo);
 
     header('Content-Type: application/pdf');
     header('Content-Disposition: attachment; filename="' . $Items->Nombre_Archivo . '.pdf"');
     echo $Items->Datos_Archivo;
     exit;
 }
 
 
    
    

    


    
}