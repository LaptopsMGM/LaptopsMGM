<?php 
require_once SYS . DIRECTORY_SEPARATOR . 'Controlador.php'; 
require_once MOD . DIRECTORY_SEPARATOR . 'Modelo_camara.php'; 
/* * Clase CtrlModelo_camara */ 
class CtrlModelo_camara extends Controlador { public function index(){ 
    # Mostramos los datos 
    $modelo_camara = new Modelo_camara(); 
    $datosModelo_camara = $modelo_camara->leer(); 
    $datos = array( 
        'titulo'=>'Modelo_camara', 
        'encabezado'=>'Listado de Modelo_camara', 
        'datos'=>$datosModelo_camara, 
    ); 
    $this->mostrarVista('modelo_camara/mostrar.php',$datos); 
} 
public function eliminar(){ 
    if (isset($_REQUEST['id'])) {
        $modelo_camara = new Modelo_camara($_REQUEST['id']); 
        $modelo_camara->eliminar(); $this->index(); 
    }
    else 
    echo "...El Id a ELIMINAR es requerido"; 
} 
public function guardarNuevo(){ 
    $modelo_camara = new modelo_camara ( 
        $_POST["id"], 
        $_POST["modelo_camara"], 
        $_POST["modelo"], 
    ); 
    $modelo_camara->nuevo(); 
    $this->index(); 
} 
public function guardarEditar(){ 
    $modelo_camara = new modelo_camara ( 
        $_POST["id"], #El id que enviamos 
        $_POST["modelo_camara"], 
        $_POST["modelo"], 
    );
     $modelo_camara->editar();
     $this->index();
}
public function nuevo(){ 
    #Mostramos el Formulario de Nuevo 
    $datos=array( 
        'encabezado'=>'Nuevo Modelo_camara' 
    ); 
    $this->mostrarVista('modelo_camara/frmNuevo.php',$datos); 
} 
public function editar(){ 
    #Mostramos el Formulario de Editar 
    if (isset($_REQUEST['id'])) { 
        $modelo_camara = new Modelo_camara($_REQUEST['id']); 
        $modelo_camara->leer(false); 
        $datos = array( 
            'encabezado'=>'Editando Modelo_camara: '. $_REQUEST['id'], 
            'modelo_camara'=>$modelo_camara, 
        ); 
        $this->mostrarVista('modelo_camara/frmEditar.php',$datos); 
    } 
    else 
    echo "...El Id a EDITAR es requerido"; 
} 
}