<?php
class Ingresar extends Controlador
{

    function __construct()
    {
        parent::__construct();
        $this->vista->titulo = "REGISTRAR";
        $this->vista->mensaje = "";
    }

    

    function cargarEmpleado()
    {
        session_start();
        if (!isset($_SESSION['rol'])) {
            header('location: ' . constant('URL') . 'Login');
        } else {
            if ($_SESSION['rol'] != 1) {
                header('location: ' . constant('URL') . 'Login');
            } else {
                $this->vista->aviso = "REGISTRO DE EMPLEADO";
                $opcEstado = $this->modelo->getEstadoEmpleado();
                $this->vista->opcEstado = $opcEstado;
                $this->vista->cargar('admin/ingresar/empleado');
            }
        }
    }

    function registrarEmpleado()
    {
        $cedula = $_POST['cedula'];
        $estado = $_POST['estado'];
        $apellido = $_POST['apellido'];
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $clave = $_POST['clave'];



        if (empty($cedula) || empty($apellido) || empty($nombre) || empty($correo) || empty($estado) || empty($clave)) {
            $msj = "ERROR AL REGISTRAR EL EMPLEADO: EXISTEN DATOS VACIOS";
            $alert = "alert alert-danger";
        } else {
            $msj = "";
            $alert = "";

            if (
                $this->modelo->insertarEmple([
                    'cedula' => $cedula,
                    'estado' => $estado,
                    'apellido' => $apellido,
                    'nombre' => $nombre,
                    'correo' => $correo,
                    'clave' => $clave
                ])
            ) {
                $msj = "EMPLEADO REGISTRADO CON ÉXITO";
                $alert = "alert alert-success";

                if (isset($_POST['telefono'])) {
                    $telefonos = $_POST['telefono'];
                    foreach ($telefonos as $telefono) {
                        // Aquí puedes realizar las operaciones necesarias, como guardar en una base de datos, enviar por correo electrónico, etc.
                        $this->modelo->insertarCelularEmpleado([
                            'cedula' => $cedula,
                            'telefono' => $telefono
                        ]);
                    }
                }
            } else {
                $msj = "ERROR AL REGISTRAR EL EMPLEADO ";
                $alert = "alert alert-danger";
            }
        }

        $this->vista->mensaje = $msj;
        $this->vista->alerta = $alert;
        $this->cargarEmpleado();


    }

    function cargarItem()
{
        session_start();
        if (!isset($_SESSION['rol'])) {
            header('location: ' . constant('URL') . 'Login');
        } else {
            if ($_SESSION['rol'] != 1) {
                header('location: ' . constant('URL') . 'Login');
            } else {
                $this->vista->aviso = "REGISTRO DE ITEM";
                $opcEstado = $this->modelo->getEstadoItem();
                $this->vista->opcEstado = $opcEstado;
                $this->vista->cargar('admin/ingresar/Items');
            }
        }
}

    function registrarItem()
{
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];

    if (empty($id) || empty($nombre)) {
        $msj = "ERROR AL REGISTRAR EL ITEM: EXISTEN DATOS VACIOS";
        $alert = "alert alert-danger";
    } else {
        $msj = "";
        $alert = "";

        if (
            $this->modelo->insertarItem([
                'id' => $id,
                'nombre' => $nombre
            ])
        ) {
            $msj = "ITEM REGISTRADO CON ÉXITO";
            $alert = "alert alert-success";
        } else {
            $msj = "ERROR AL REGISTRAR EL ITEM";
            $alert = "alert alert-danger";
        }
    }

    $this->vista->mensaje = $msj;
    $this->vista->alerta = $alert;
    $this->cargarItem();
}

function cargarSubitems()
{
    session_start();
    if (!isset($_SESSION['rol'])) {
        header('location: ' . constant('URL') . 'Login');
    } else {
        if ($_SESSION['rol'] != 1) {
            header('location: ' . constant('URL') . 'Login');
        } else {
            $this->vista->aviso = "REGISTRO DE SUBITEM";
            $opcEstado = $this->modelo->getSubitems();
            $this->vista->opcEstado = $opcEstado;

            // obtener todos los items y pasarlos a la vista
            $items = $this->modelo->getEstadosItem();
            $this->vista->items = $items;

            $this->vista->cargar('admin/ingresar/subitems');
        }
    }
}


function registrarSubitem()
{
    $nombre = $_POST['nombre'];
    $contenido = $_POST['contenido'];
    $imagen = $_POST['imagen'];
    $enlace = $_POST['enlace'];
    $id_item = $_POST['id_item'];  // capturando el id_item desde el formulario

    if (empty($nombre) || empty($contenido) ) {
        $msj = "ERROR AL REGISTRAR EL SUBITEM: EXISTEN DATOS VACIOS";
        $alert = "alert alert-danger";
    } else {
        $msj = "";
        $alert = "";

        if (
            $this->modelo->insertarSubitem([
                'id_item' => $id_item,  // insertando el id_item capturado desde el formulario
                'nombre' => $nombre,
                'contenido' => $contenido,
                'imagen' => $imagen,
                'enlace' => $enlace
            ])
        ) {
            $msj = "SUBITEM REGISTRADO CON ÉXITO";
            $alert = "alert alert-success";
        } else {
            $msj = "ERROR AL REGISTRAR EL SUBITEM";
            $alert = "alert alert-danger";
        }
    }

    $this->vista->mensaje = $msj;
    $this->vista->alerta = $alert;
    $this->cargarSubitems();
}

// Aca empieza Ejercicios y sub ejercicios 
//********** */


function cargarEjercicio()
{
        session_start();
        if (!isset($_SESSION['rol'])) {
            header('location: ' . constant('URL') . 'Login');
        } else {
            if ($_SESSION['rol'] != 1) {
                header('location: ' . constant('URL') . 'Login');
            } else {
                $this->vista->aviso = "REGISTRO DE ITEM";
                $opcEstado = $this->modelo->getEstadoEjercicios();
                $this->vista->opcEstado = $opcEstado;
                $this->vista->cargar('admin/ingresar/Ejercicio');
            }
        }
}

    function registrarEjercicio()
{
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];

    if (empty($id) || empty($nombre)) {
        $msj = "ERROR AL REGISTRAR EL ITEM: EXISTEN DATOS VACIOS";
        $alert = "alert alert-danger";
    } else {
        $msj = "";
        $alert = "";

        if (
            $this->modelo->insertarEjercicios([
                'id' => $id,
                'nombre' => $nombre
            ])
        ) {
            $msj = "ITEM REGISTRADO CON ÉXITO";
            $alert = "alert alert-success";
        } else {
            $msj = "ERROR AL REGISTRAR EL ITEM";
            $alert = "alert alert-danger";
        }
    }

    $this->vista->mensaje = $msj;
    $this->vista->alerta = $alert;
    $this->cargarEjercicio();
}

function cargarSubejercicios()
{
    session_start();
    if (!isset($_SESSION['rol'])) {
        header('location: ' . constant('URL') . 'Login');
    } else {
        if ($_SESSION['rol'] != 1) {
            header('location: ' . constant('URL') . 'Login');
        } else {
            $this->vista->aviso = "REGISTRO DE SUBITEM";
            $opcEstado = $this->modelo->getSubEjercicio();
            $this->vista->opcEstado = $opcEstado;

            // obtener todos los items y pasarlos a la vista
            $items = $this->modelo->getEstadosEjercicios();
            $this->vista->items = $items;

            $this->vista->cargar('admin/ingresar/subejercicio');
        }
    }
}


function registrarSubejercicio()
{
    $nombre = $_POST['nombre'];
    $contenido = $_POST['contenido'];
    $imagen = $_POST['imagen'];
    $enlace = $_POST['enlace'];
    $id_item = $_POST['id_item'];  // capturando el id_item desde el formulario

    if (empty($nombre) || empty($contenido) ) {
        $msj = "ERROR AL REGISTRAR EL subejercicios: EXISTEN DATOS VACIOS";
        $alert = "alert alert-danger";
    } else {
        $msj = "";
        $alert = "";

        if (
            $this->modelo->insertarSubEjercicios([
                'id_item' => $id_item,  // insertando el id_item capturado desde el formulario
                'nombre' => $nombre,
                'contenido' => $contenido,
                'imagen' => $imagen,
                'enlace' => $enlace
            ])
        ) {
            $msj = "Subejercicio REGISTRADO CON ÉXITO";
            $alert = "alert alert-success";
        } else {
            $msj = "ERROR AL REGISTRAR EL SUBITEM";
            $alert = "alert alert-danger";
        }
    }

    $this->vista->mensaje = $msj;
    $this->vista->alerta = $alert;
    $this->cargarSubejercicios();
}

    
 // Aca empieza Radares y sub Radares 
//********** */


function cargarRadar()
{
        session_start();
        if (!isset($_SESSION['rol'])) {
            header('location: ' . constant('URL') . 'Login');
        } else {
            if ($_SESSION['rol'] != 1) {
                header('location: ' . constant('URL') . 'Login');
            } else {
                $this->vista->aviso = "REGISTRO DE ITEM";
                $opcEstado = $this->modelo->getEstadoRadares();
                $this->vista->opcEstado = $opcEstado;
                $this->vista->cargar('admin/ingresar/Radar');
            }
        }
}

    function registrarRadar()
{
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];

    if (empty($id) || empty($nombre)) {
        $msj = "ERROR AL REGISTRAR EL Radar: EXISTEN DATOS VACIOS";
        $alert = "alert alert-danger";
    } else {
        $msj = "";
        $alert = "";

        if (
            $this->modelo->insertarradares([
                'id' => $id,
                'nombre' => $nombre
            ])
        ) {
            $msj = "Radar REGISTRADO CON ÉXITO";
            $alert = "alert alert-success";
        } else {
            $msj = "ERROR AL REGISTRAR EL ITEM";
            $alert = "alert alert-danger";
        }
    }

    $this->vista->mensaje = $msj;
    $this->vista->alerta = $alert;
    $this->CargarRadar();
}

function cargarSubRadar()
{
    session_start();
    if (!isset($_SESSION['rol'])) {
        header('location: ' . constant('URL') . 'Login');
    } else {
        if ($_SESSION['rol'] != 1) {
            header('location: ' . constant('URL') . 'Login');
        } else {
            $this->vista->aviso = "REGISTRO DE SUBITEM";
            $opcEstado = $this->modelo->getSubRadar();
            $this->vista->opcEstado = $opcEstado;

            // obtener todos los items y pasarlos a la vista
            $items = $this->modelo->getEstadosradares();
            $this->vista->items = $items;

            $this->vista->cargar('admin/ingresar/subRadar');
        }
    }
}


function registrarSubRadar()
{
    $nombre = $_POST['nombre'];
    $contenido = $_POST['contenido'];
    $imagen = $_POST['imagen'];
    $enlace = $_POST['enlace'];
    $id_item = $_POST['id_item'];  // capturando el id_item desde el formulario

    if (empty($nombre) || empty($contenido) ) {
        $msj = "ERROR AL REGISTRAR EL subejercicios: EXISTEN DATOS VACIOS";
        $alert = "alert alert-danger";
    } else {
        $msj = "";
        $alert = "";

        if (
            $this->modelo->insertarSubRadares([
                'id_item' => $id_item,  // insertando el id_item capturado desde el formulario
                'nombre' => $nombre,
                'contenido' => $contenido,
                'imagen' => $imagen,
                'enlace' => $enlace
            ])
        ) {
            $msj = "Subejercicio REGISTRADO CON ÉXITO";
            $alert = "alert alert-success";
        } else {
            $msj = "ERROR AL REGISTRAR EL SUBITEM";
            $alert = "alert alert-danger";
        }
    }

    $this->vista->mensaje = $msj;
    $this->vista->alerta = $alert;
    $this->CargarsubRadar();
}
 



  // Aca empieza Programa y sub Programa 
//********** */


function cargarProgramas()
{
        session_start();
        if (!isset($_SESSION['rol'])) {
            header('location: ' . constant('URL') . 'Login');
        } else {
            if ($_SESSION['rol'] != 1) {
                header('location: ' . constant('URL') . 'Login');
            } else {
                $this->vista->aviso = "REGISTRO DE ITEM";
                $opcEstado = $this->modelo->getEstadoProgramas();
                $this->vista->opcEstado = $opcEstado;
                $this->vista->cargar('admin/ingresar/Programa');
            }
        }
}

    function registrarPrograma()
{
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];

    if (empty($id) || empty($nombre)) {
        $msj = "ERROR AL REGISTRAR EL Programa: EXISTEN DATOS VACIOS";
        $alert = "alert alert-danger";
    } else {
        $msj = "";
        $alert = "";

        if (
            $this->modelo->insertarprogramas([
                'id' => $id,
                'nombre' => $nombre
            ])
        ) {
            $msj = "Programa REGISTRADO CON ÉXITO";
            $alert = "alert alert-success";
        } else {
            $msj = "ERROR AL REGISTRAR EL ITEM";
            $alert = "alert alert-danger";
        }
    }

    $this->vista->mensaje = $msj;
    $this->vista->alerta = $alert;
    $this->cargarProgramas();
}

function cargarSubPrograma()
{
    session_start();
    if (!isset($_SESSION['rol'])) {
        header('location: ' . constant('URL') . 'Login');
    } else {
        if ($_SESSION['rol'] != 1) {
            header('location: ' . constant('URL') . 'Login');
        } else {
            $this->vista->aviso = "REGISTRO DE SUBPROGRAMA";
            $opcEstado = $this->modelo->getSubProgramas();
            $this->vista->opcEstado = $opcEstado;

            // obtener todos los items y pasarlos a la vista
            $items = $this->modelo->getEstadosProgramas();
            $this->vista->items = $items;

            $this->vista->cargar('admin/ingresar/subPrograma');
        }
    }
}


function registrarSubPrograma()
{
    $nombre = $_POST['nombre'];
    $contenido = $_POST['contenido'];
    $imagen = $_POST['imagen'];
    $enlace = $_POST['enlace'];
    $id_item = $_POST['id_item'];  // capturando el id_item desde el formulario

    if (empty($nombre) || empty($contenido) ) {
        $msj = "ERROR AL REGISTRAR EL subPrograma: EXISTEN DATOS VACIOS";
        $alert = "alert alert-danger";
    } else {
        $msj = "";
        $alert = "";

        if (
            $this->modelo->insertarSubProgramas([
                'id_item' => $id_item,  // insertando el id_item capturado desde el formulario
                'nombre' => $nombre,
                'contenido' => $contenido,
                'imagen' => $imagen,
                'enlace' => $enlace
            ])
        ) {
            $msj = "subPrograma REGISTRADO CON ÉXITO";
            $alert = "alert alert-success";
        } else {
            $msj = "ERROR AL REGISTRAR EL SubPrograma";
            $alert = "alert alert-danger";
        }
    }

    $this->vista->mensaje = $msj;
    $this->vista->alerta = $alert;
    $this->cargarSubPrograma();
}
 
function cargarArchivos()
{
        session_start();
        if (!isset($_SESSION['rol'])) {
            header('location: ' . constant('URL') . 'Login');
        } else {
            if ($_SESSION['rol'] != 2) {
                header('location: ' . constant('URL') . 'Login');
            } else {
                $this->vista->aviso = "REGISTRO DE Archivos";
                $opcEstado = $this->modelo->getArchivos();
                $this->vista->opcEstado = $opcEstado;
                $this->vista->cargar('usuarios/ingresar/resultado');
            }
        }
}
function registrarArchivo()
{
    $Nombre_Archivo = $_POST['Nombre_Archivo'];
    $cedula = $_POST['cedula'];

    // Aquí es donde verificas si el archivo es un PDF
    if ($_FILES['Datos_Archivo']['type'] == "application/pdf") {
        $Datos_Archivo = file_get_contents($_FILES['Datos_Archivo']['tmp_name']);
    } else {
        $this->vista->mensaje = "ERROR AL REGISTRAR EL ARCHIVO: NO ES UN PDF";
        $this->vista->alerta = "alert alert-danger";
        $this->cargarArchivos();
        return;
    }

    if (empty($Nombre_Archivo) || empty($cedula)) {
        $msj = "ERROR AL REGISTRAR EL ARCHIVO: EXISTEN DATOS VACIOS";
        $alert = "alert alert-danger";
    } else {
        $msj = "";
        $alert = "";

        if (
            $this->modelo->insertarArchivo([
                'Nombre_Archivo' => $Nombre_Archivo,
                'cedula' => $cedula,
                'Datos_Archivo' => $Datos_Archivo
            ])
        ) {
            $msj = "ARCHIVO REGISTRADO CON ÉXITO";
            $alert = "alert alert-success";
        } else {
            $msj = "ERROR AL REGISTRAR EL ARCHIVO";
            $alert = "alert alert-danger";
        }
    }

    $this->vista->mensaje = $msj;
    $this->vista->alerta = $alert;
    $this->cargarArchivos();
}

function cargarComentarios()
{
        session_start();
        if (!isset($_SESSION['rol'])) {
            header('location: ' . constant('URL') . 'Login');
        } else {
            if ($_SESSION['rol'] != 1) {
                header('location: ' . constant('URL') . 'Login');
            } else {
                $this->vista->aviso = "REGISTRO DE Archivos";
                $opcEstado = $this->modelo->getcomentarios();
                $this->vista->opcEstado = $opcEstado;
                $this->vista->cargar('admin/ingresar/comentarios');
            }
        }
}
function registrarComentario()
{
    $ID_Archivo = $_POST['ID_Archivo'];
    $cedula = $_POST['cedula'];
    $Comentario_Texto = $_POST['Comentario_Texto'];

    if (empty($ID_Archivo) || empty($cedula) || empty($Comentario_Texto)) {
        $msj = "ERROR AL REGISTRAR EL COMENTARIO: EXISTEN DATOS VACIOS";
        $alert = "alert alert-danger";
    } else {
        $msj = "";
        $alert = "";

        if (
            $this->modelo->insertarComentario([
                'ID_Archivo' => $ID_Archivo,
                'cedula' => $cedula,
                'Comentario_Texto' => $Comentario_Texto
            ])
        ) {
            $msj = "COMENTARIO REGISTRADO CON ÉXITO";
            $alert = "alert alert-success";
        } else {
            $msj = "ERROR AL REGISTRAR EL COMENTARIO";
            $alert = "alert alert-danger";
        }
    }

    $this->vista->mensaje = $msj;
    $this->vista->alerta = $alert;
    $this->cargarComentarios();
}
 
    
    
    
    
    
    




}