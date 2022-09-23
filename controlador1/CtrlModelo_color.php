<?php 
require_once SYS . DIRECTORY_SEPARATOR . 'Controlador.php'; 
require_once MOD . DIRECTORY_SEPARATOR . 'Modelo_color.php'; 
/* * Clase CtrlModelo_color */ 
class CtrlModelo_color extends Controlador { public function index(){ 
    # Mostramos los datos 
    $modelo_color = new Modelo_color(); 
    $datosModelo_color = $modelo_color->leer(); 
    $datos = array( 
        'titulo'=>'Modelo_color', 
        'encabezado'=>'Listado de Modelo_color', 
        'datos'=>$datosModelo_color, 
    ); 
    $this->mostrarVista('modelo_color/mostrar.php',$datos); 
} 
public function eliminar(){ 
    if (isset($_REQUEST['id'])) {
        $modelo_color = new Modelo_color($_REQUEST['id']); 
        $modelo_color->eliminar(); $this->index(); 
    }
    else 
    echo "...El Id a ELIMINAR es requerido"; 
} 
public function guardarNuevo(){ 
    $modelo_color = new modelo_Color ( 
        $_POST["id"], 
        $_POST["modelo_color"], 
        $_POST["modelo"], 
    ); 
    $modelo_color->nuevo(); 
    $this->index(); 
} 
public function guardarEditar(){ 
    $modelo_color = new modelo_Color ( 
        $_POST["id"], #El id que enviamos 
        $_POST["modelo_color"], 
        $_POST["modelo"], 
    );
     $modelo_color->editar();
     $this->index();
}
public function nuevo(){ 
    #Mostramos el Formulario de Nuevo 
    $datos=array( 
        'encabezado'=>'Nuevo Modelo_color' 
    ); 
    $this->mostrarVista('modelo_color/frmNuevo.php',$datos); 
} 
public function editar(){ 
    #Mostramos el Formulario de Editar 
    if (isset($_REQUEST['id'])) { 
        $modelo_color = new Modelo_color($_REQUEST['id']); 
        $modelo_color->leer(false); 
        $datos = array( 
            'encabezado'=>'Editando Modelo_color: '. $_REQUEST['id'], 
            'modelo_color'=>$modelo_color, 
        ); 
        $this->mostrarVista('modelo_color/frmEditar.php',$datos); 
    } 
    else 
    echo "...El Id a EDITAR es requerido"; 
} 
}