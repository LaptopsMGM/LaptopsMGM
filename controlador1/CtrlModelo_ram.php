<?php 
require_once SYS . DIRECTORY_SEPARATOR . 'Controlador.php'; 
require_once MOD . DIRECTORY_SEPARATOR . 'Modelo_ram.php'; 
/* * Clase CtrlModelo_ram */ 
class CtrlModelo_ram extends Controlador { public function index(){ 
    # Mostramos los datos 
    $modelo_ram = new Modelo_ram(); 
    $datosModelo_ram = $modelo_ram->leer(); 
    $datos = array( 
        'titulo'=>'Modelo_ram', 
        'encabezado'=>'Listado de Modelo_ram', 
        'datos'=>$datosModelo_ram, 
    ); 
    $this->mostrarVista('modelo_ram/mostrar.php',$datos); 
} 
public function eliminar(){ 
    if (isset($_REQUEST['id'])) {
        $modelo_ram = new modelo_ram($_REQUEST['id']); 
        $modelo_ram->eliminar(); $this->index(); 
    }
    else 
    echo "...El Id a ELIMINAR es requerido"; 
} 
public function guardarNuevo(){ 
    $modelo_ram = new modelo_ram ( 
        $_POST["id"], 
        $_POST["modelo_ram"], 
        $_POST["modelo"], 
    ); 
    $modelo_ram->nuevo(); 
    $this->index(); 
} 
public function guardarEditar(){ 
    $modelo_ram = new Modelo_ram ( 
        $_POST["id"], #El id que enviamos 
        $_POST["modelo_ram"], 
        $_POST["modelo"], 
    );
     $modelo_ram->editar();
     $this->index();
}
public function nuevo(){ 
    #Mostramos el Formulario de Nuevo 
    $datos=array( 
        'encabezado'=>'Nuevo Modelo_ram' 
    ); 
    $this->mostrarVista('modelo_ram/frmNuevo.php',$datos); 
} 
public function editar(){ 
    #Mostramos el Formulario de Editar 
    if (isset($_REQUEST['id'])) { 
        $modelo_ram = new Modelo_ram($_REQUEST['id']); 
        $modelo_ram->leer(false); 
        $datos = array( 
            'encabezado'=>'Editando Modelo_ram: '. $_REQUEST['id'], 
            'modelo_ram'=>$modelo_ram, 
        ); 
        $this->mostrarVista('modelo_ram/frmEditar.php',$datos); 
    } 
    else 
    echo "...El Id a EDITAR es requerido"; 
} 
}