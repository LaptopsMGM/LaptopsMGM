<?php 
require_once SYS . DIRECTORY_SEPARATOR . 'Controlador.php'; 
require_once MOD . DIRECTORY_SEPARATOR . 'Camara.php'; 
/* * Clase CtrlCamara */ 
class CtrlCamara extends Controlador { 
public function index(){ 
    # Mostramos los datos 
    $camara = new Camara(); 
    $datosCamara = $camara->leer(); 
    $datos = array( 
        'titulo'=>'Camara', 
        'encabezado'=>'Listado de Camara', 
        'datos'=>$datosCamara, 
    ); 
    $this->mostrarVista('camara/mostrar.php',$datos); 
} 
public function eliminar(){ 
    if (isset($_REQUEST['id'])) {
        $camara = new Camara($_REQUEST['id']); 
        $camara->eliminar(); $this->index(); 
    }
    else 
    echo "...El Id a ELIMINAR es requerido"; 
} 
public function guardarNuevo(){ 
    $camara = new Camara ( 
        $_POST["id"], 
        $_POST["camara"], 
    ); 
    $camara->nuevo(); 
    $this->index(); 
} 
public function guardarEditar(){ 
    $camara = new Camara ( 
        $_POST["id"], #El id que enviamos 
        $_POST["camara"], 
    );
     $camara->editar();
     $this->index();
}
public function nuevo(){ 
    #Mostramos el Formulario de Nuevo 
    $datos=array( 
        'encabezado'=>'Nuevo Camara' 
    ); 
    $this->mostrarVista('camara/frmNuevo.php',$datos); 
} 
public function editar(){ 
    #Mostramos el Formulario de Editar 
    if (isset($_REQUEST['id'])) { 
        $camara = new Camara($_REQUEST['id']); 
        $camara->leer(false); 
        $datos = array( 
            'encabezado'=>'Editando Camara: '. $_REQUEST['id'], 
            'camara'=>$camara, 
        ); 
        $this->mostrarVista('camara/frmEditar.php',$datos); 
    } 
    else 
    echo "...El Id a EDITAR es requerido"; 
} 
}