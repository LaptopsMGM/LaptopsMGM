<?php 
require_once SYS . DIRECTORY_SEPARATOR . 'Controlador.php'; 
require_once MOD . DIRECTORY_SEPARATOR . 'Equipo.php'; 
/* * Clase CtrlEquipo */ 
class CtrlEquipo extends Controlador { public function index(){ 
    # Mostramos los datos 
    $equipo = new Equipo(); 
    $datosEquipo = $equipo->leer(); 
    $datos = array( 
        'titulo'=>'Equipo', 
        'encabezado'=>'Listado de Equipo', 
        'datos'=>$datosEquipo, 
    ); 
    $this->mostrarVista('equipo/mostrar.php',$datos); 
} 
public function eliminar(){ 
    if (isset($_REQUEST['id'])) {
        $equipo = new Equipo($_REQUEST['id']); 
        $equipo->eliminar(); $this->index(); 
    }
    else 
    echo "...El Id a ELIMINAR es requerido"; 
} 
public function guardarNuevo(){ 
    $equipo = new Equipo ( 
        $_POST["id"], 
        $_POST["equipo"], 
    ); 
    $equipo->nuevo(); 
    $this->index(); 
} 
public function guardarEditar(){ 
    $equipo = new Equipo ( 
        $_POST["id"], #El id que enviamos 
        $_POST["Equipo"], 
    );
     $equipo->editar();
     $this->index();
}
public function nuevo(){ 
    #Mostramos el Formulario de Nuevo 
    $datos=array( 
        'encabezado'=>'Nuevo Equipo' 
    ); 
    $this->mostrarVista('equipo/frmNuevo.php',$datos); 
} 
public function editar(){ 
    #Mostramos el Formulario de Editar 
    if (isset($_REQUEST['id'])) { 
        $equipo = new Equipo($_REQUEST['id']); 
        $equipo->leer(false); 
        $datos = array( 
            'encabezado'=>'Editando Equipo: '. $_REQUEST['id'], 
            'equipo'=>$equipo, 
        ); 
        $this->mostrarVista('equipo/frmEditar.php',$datos); 
    } 
    else 
    echo "...El Id a EDITAR es requerido"; 
} 
}