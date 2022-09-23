<?php 
require_once SYS . DIRECTORY_SEPARATOR . 'Controlador.php'; 
require_once MOD . DIRECTORY_SEPARATOR . 'Color.php'; 
/* * Clase CtrlColor */ 
class CtrlColor extends Controlador { public function index(){ 
    # Mostramos los datos 
    $color = new Color(); 
    $datosColor = $color->leer(); 
    $datos = array( 
        'titulo'=>'Colores', 
        'encabezado'=>'Listado de Colores', 
        'datos'=>$datosColor, 
    ); 
    $this->mostrarVista('color/mostrar.php',$datos); 
} 
public function eliminar(){ 
    if (isset($_REQUEST['id'])) {
        $color = new Color($_REQUEST['id']); 
        $color->eliminar(); $this->index(); 
    }
    else 
    echo "...El Id a ELIMINAR es requerido"; 
} 
public function guardarNuevo(){ 
    $color = new Color ( 
        $_POST["id"], 
        $_POST["color"], 
    ); 
    $color->nuevo(); 
    $this->index(); 
} 
public function guardarEditar(){ 
    $color = new Color ( 
        $_POST["id"], #El id que enviamos 
        $_POST["color"], 
    );
     $color->editar();
     $this->index();
}
public function nuevo(){ 
    #Mostramos el Formulario de Nuevo 
    $datos=array( 
        'encabezado'=>'Nuevo Color' 
    ); 
    $this->mostrarVista('color/frmNuevo.php',$datos); 
} 
public function editar(){ 
    #Mostramos el Formulario de Editar 
    if (isset($_REQUEST['id'])) { 
        $color = new Color($_REQUEST['id']); 
        $color->leer(false); 
        $datos = array( 
            'encabezado'=>'Editando Color: '. $_REQUEST['id'], 
            'color'=>$color, 
        ); 
        $this->mostrarVista('color/frmEditar.php',$datos); 
    } 
    else 
    echo "...El Id a EDITAR es requerido"; 
} 
}