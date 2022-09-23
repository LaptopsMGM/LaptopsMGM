<?php
require_once SYS . DIRECTORY_SEPARATOR . 'Controlador.php';

require_once MOD . DIRECTORY_SEPARATOR . 'Cliente.php';

/*
* Clase CtrlCliente
*/
class CtrlCliente extends Controlador {
    
    public function index(){
        # Mostramos los datos
        $cliente = new Cliente();
        $datosCliente = $cliente->leer();
        $datos = array(
                'titulo'=>'Cliente',
                'encabezado'=>'Listado de Cliente',
                'datos'=>$datosCliente,
            );
        $this->mostrarVista('cliente/mostrar.php',$datos);
    }
    public function con1(){
        # Mostramos los datos
        $cliente = new Cliente();
        $datosCliente = $cliente->consulta1();
        echo json_encode($datosCliente); exit();
    }
    public function eliminar(){
        if (isset($_REQUEST['id'])) {
            $cliente = new Cliente($_REQUEST['id']);
            $cliente->eliminar();
            $this->index();
        } else {
            echo "...El Id a ELIMINAR es requerido";
        }
    }
    public function guardarNuevo(){
        $cliente = new Cliente (
                $_POST["id"],
                $_POST["nombre"],
                $_POST["apellido"],
                $_POST["DNI"],
                $_POST["genero"],
                );
        $cliente->nuevo();

        $this->index();
    }
    public function guardarEditar(){
        $cliente = new Cliente (
                $_POST["id"],    #El id que enviamos
                $_POST["nombre"],
                $_POST["apellido"],
                $_POST["DNI"],
                $_POST["genero"],
                );
        $cliente->editar();

        $this->index();
    }
    public function nuevo(){
        #Mostramos el Formulario de Nuevo
        $datos=array(
            'encabezado'=>'Nuevo Cliente'
            );
         $this->mostrarVista('cliente/frmNuevo.php',$datos);
    }
    public function editar(){
        #Mostramos el Formulario de Editar
        if (isset($_REQUEST['id'])) {
            $cliente = new Cliente($_REQUEST['id']);
            $cliente->leer(false);
            $datos = array(
                'encabezado'=>'Editando Cliente: '. $_REQUEST['id'],
                'cliente'=>$cliente, 
               );
            $this->mostrarVista('cliente/frmEditar.php',$datos);
        } else {
            echo "...El Id a Editar es requerido";
        }
        
    }
}