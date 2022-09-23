<?php 
require_once SYS . DIRECTORY_SEPARATOR . 'Controlador.php'; 
require_once MOD . DIRECTORY_SEPARATOR . 'Modelo_almacenamiento.php'; 
/* * Clase CtrlModelo_almacenamiento */ 
class CtrlModelo_almacenamiento extends Controlador { public function index(){ 
    # Mostramos los datos 
    $modelo_almacenamiento = new Modelo_almacenamiento(); 
    $datosModelo_almacenamiento = $modelo_almacenamiento->leer(); 
    $datos = array( 
        'titulo'=>'Modelo_almacenamientos', 
        'encabezado'=>'Listado de Modelo_almacenamientos', 
        'datos'=>$datosModelo_almacenamiento, 
    ); 
    $this->mostrarVista('modelo_almacenamiento/mostrar.php',$datos); 
} 
public function eliminar(){ 
    if (isset($_REQUEST['id'])) {
        $modelo_almacenamiento = new modelo_almacenamiento($_REQUEST['id']); 
        $modelo_almacenamiento->eliminar(); $this->index(); 
    }
    else 
    echo "...El Id a ELIMINAR es requerido"; 
} 
public function guardarNuevo(){ 
    $modelo_almacenamiento = new modelo_almacenamiento ( 
        $_POST["id"], 
        $_POST["modelo_almacenamiento"], 
    ); 
    $modelo_almacenamiento->nuevo(); 
    $this->index(); 
} 
public function guardarEditar(){ 
    $modelo_almacenamiento = new modelo_almacenamiento ( 
        $_POST["id"], #El id que enviamos 
        $_POST["Modelo_almacenamiento"], 
    );
     $modelo_almacenamiento->editar();
     $this->index();
}
public function nuevo(){ 
    #Mostramos el Formulario de Nuevo 
    $datos=array( 
        'encabezado'=>'Nuevo modelo_almacenamiento' 
    ); 
    $this->mostrarVista('modelo_almacenamiento/frmNuevo.php',$datos); 
} 
public function editar(){ 
    #Mostramos el Formulario de Editar 
    if (isset($_REQUEST['id'])) { 
        $modelo_almacenamiento = new modelo_almacenamiento($_REQUEST['id']); 
        $modelo_almacenamiento->leer(false); 
        $datos = array( 
            'encabezado'=>'Editando modelo_almacenamiento: '. $_REQUEST['id'], 
            'modelo_almacenamiento'=>$modelo_almacenamiento, 
        ); 
        $this->mostrarVista('modelo_almacenamiento/frmEditar.php',$datos); 
    } 
    else 
    echo "...El Id a EDITAR es requerido"; 
} 
}