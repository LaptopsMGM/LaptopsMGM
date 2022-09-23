<?php 
require_once SYS . DIRECTORY_SEPARATOR . 'Controlador.php'; 
require_once MOD . DIRECTORY_SEPARATOR . 'Tamaño.php'; 
/* * Clase CtrlColor */ 
class CtrlTamaño extends Controlador { public function index(){ 
    # Mostramos los datos 
    $tamaño = new Tamaño(); 
    $datosTamaño = $tamaño->leer(); 
    $datos = array( 
        'titulo'=>'Tamaño', 
        'encabezado'=>'Listado de Tamaño', 
        'datos'=>$datosTamaño, 
    ); 
    $this->mostrarVista('tamaño/mostrar.php',$datos); 
} 
public function eliminar(){ 
    if (isset($_REQUEST['id'])) {
        $tamaño = new Tamaño($_REQUEST['id']); 
        $tamaño->eliminar(); $this->index(); 
    }
    else 
    echo "...El Id a ELIMINAR es requerido"; 
} 
public function guardarNuevo(){ 
    $tamaño = new Tamaño ( 
        $_POST["id"], 
        $_POST["tamaño"], 
    ); 
    $tamaño->nuevo(); 
    $this->index(); 
} 
public function guardarEditar(){ 
    $tamaño = new Tamaño ( 
        $_POST["id"], #El id que enviamos 
        $_POST["tamaño"], 
    );
     $tamaño->editar();
     $this->index();
}
public function nuevo(){ 
    #Mostramos el Formulario de Nuevo 
    $datos=array( 
        'encabezado'=>'Nuevo Tamaño' 
    ); 
    $this->mostrarVista('tamaño/frmNuevo.php',$datos); 
} 
public function editar(){ 
    #Mostramos el Formulario de Editar 
    if (isset($_REQUEST['id'])) { 
        $tamaño = new Tamaño($_REQUEST['id']); 
        $tamaño->leer(false); 
        $datos = array( 
            'encabezado'=>'Editando Tamaño: '. $_REQUEST['id'], 
            'tamaño'=>$tamaño, 
        ); 
        $this->mostrarVista('tamaño/frmEditar.php',$datos); 
    } 
    else 
    echo "...El Id a EDITAR es requerido"; 
} 
}