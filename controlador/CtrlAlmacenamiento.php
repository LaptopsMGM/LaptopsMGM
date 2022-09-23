<?php 
require_once SYS . DIRECTORY_SEPARATOR . 'Controlador.php'; 
require_once MOD . DIRECTORY_SEPARATOR . 'Almacenamiento.php'; 
/* * Clase CtrlAlmacenamiento */ 
class CtrlAlmacenamiento extends Controlador { public function index(){ 
    # Mostramos los datos 
    $almacenamiento = new Almacenamiento(); 
    $datosAlmacenamiento = $almacenamiento->leer(); 
    $datos = array( 
        'titulo'=>'Almacenamiento', 
        'encabezado'=>'Listado de Almacenamiento', 
        'datos'=>$datosAlmacenamiento, 
    ); 
    $this->mostrarVista('almacenamiento/mostrar.php',$datos); 
} 
public function eliminar(){ 
    if (isset($_REQUEST['id'])) {
        $almacenamiento = new Almacenamiento($_REQUEST['id']); 
        $almacenamiento->eliminar(); $this->index(); 
    }
    else 
    echo "...El Id a ELIMINAR es requerido"; 
} 
public function guardarNuevo(){ 
    $almacenamiento = new Almacenamiento ( 
        $_POST["id"], 
        $_POST["almacenamiento"], 
    ); 
    $almacenamiento->nuevo(); 
    $this->index(); 
} 
public function guardarEditar(){ 
    $almacenamiento = new Almacenamiento ( 
        $_POST["id"], #El id que enviamos 
        $_POST["almacenamiento"], 
    );
     $almacenamiento->editar();
     $this->index();
}
public function nuevo(){ 
    #Mostramos el Formulario de Nuevo 
    $datos=array( 
        'encabezado'=>'Nuevo Almacenamiento' 
    ); 
    $this->mostrarVista('almacenamiento/frmNuevo.php',$datos); 
} 
public function editar(){ 
    #Mostalmacenamientos el Formulario de Editar 
    if (isset($_REQUEST['id'])) { 
        $almacenamiento = new Almacenamiento($_REQUEST['id']); 
        $almacenamiento->leer(false); 
        $datos = array( 
            'encabezado'=>'Editando almacenamiento: '. $_REQUEST['id'], 
            'almacenamiento'=>$Almacenamiento, 
        ); 
        $this->mostrarVista('almacenamiento/frmEditar.php',$datos); 
    } 
    else 
    echo "...El Id a EDITAR es requerido"; 
} 
}