<?php 
require_once SYS . DIRECTORY_SEPARATOR . 'Controlador.php'; 
require_once MOD . DIRECTORY_SEPARATOR . 'Ram.php'; 
/* * Clase CtrlRam */ 
class CtrlRam extends Controlador { public function index(){ 
    # Mostramos los datos 
    $ram = new Ram(); 
    $datosRam = $ram->leer(); 
    $datos = array( 
        'titulo'=>'Ram', 
        'encabezado'=>'Listado de Ram', 
        'datos'=>$datosRam, 
    ); 
    $this->mostrarVista('ram/mostrar.php',$datos); 
} 
public function eliminar(){ 
    if (isset($_REQUEST['id'])) {
        $ram = new Ram($_REQUEST['id']); 
        $ram->eliminar(); $this->index(); 
    }
    else 
    echo "...El Id a ELIMINAR es requerido"; 
} 
public function guardarNuevo(){ 
    $ram = new Ram ( 
        $_POST["id"], 
        $_POST["ram"], 
    ); 
    $ram->nuevo(); 
    $this->index(); 
} 
public function guardarEditar(){ 
    $ram = new Ram ( 
        $_POST["id"], #El id que enviamos 
        $_POST["ram"], 
    );
     $ram->editar();
     $this->index();
}
public function nuevo(){ 
    #Mostramos el Formulario de Nuevo 
    $datos=array( 
        'encabezado'=>'Nuevo Ram' 
    ); 
    $this->mostrarVista('ram/frmNuevo.php',$datos); 
} 
public function editar(){ 
    #Mostramos el Formulario de Editar 
    if (isset($_REQUEST['id'])) { 
        $ram = new Ram($_REQUEST['id']); 
        $ram->leer(false); 
        $datos = array( 
            'encabezado'=>'Editando Ram: '. $_REQUEST['id'], 
            'ram'=>$ram, 
        ); 
        $this->mostrarVista('ram/frmEditar.php',$datos); 
    } 
    else 
    echo "...El Id a EDITAR es requerido"; 
} 
}