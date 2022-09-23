<?php
require_once SYS . DIRECTORY_SEPARATOR . 'Controlador.php';

require_once MOD . DIRECTORY_SEPARATOR . 'Persona.php';

/*
* Clase CtrlPersona
*/
class CtrlPersona extends Controlador {
    
    public function index(){
        # Mostramos los datos
        $persona = new Persona();
        $datosPersona = $persona->leer();
        $datos = array(
                'titulo'=>'Personas',
                'encabezado'=>'Listado de Personas',
                'datos'=>$datosPersona,
            );
        $this->mostrarVista('persona/mostrar.php',$datos);
    }
    public function eliminar(){
        if (isset($_REQUEST['id'])) {
            $persona = new Persona($_REQUEST['id']);
            $persona->eliminar();
            $this->index();
        } else 
            echo "...El Id a ELIMINAR es requerido";
    }
    public function guardarNuevo(){
        $persona = new Persona (
                $_POST["id"],
                $_POST["fecha"],
                $_POST["lugar"],
                $_POST["idtiposPersonas"],
                $_POST["iddepartamentos"],
                $_POST["idpersonas"],
                );
        $persona->nuevo();
        $this->index();
    }
    public function guardarEditar(){
        $persona = new Persona (
                $_POST["id"],
                $_POST["fecha"],
                $_POST["lugar"],
                $_POST["idtiposPersonas"],
                $_POST["iddepartamentos"],
                $_POST["idpersonas"],
                );
        $persona->editar();

        $this->index();
    }
    public function nuevo(){
        $persona = new Persona();
        #Mostramos el Formulario de Nuevo
        $datos=array(
            'encabezado'=>'Nuevo Persona',
            'Persona'=>$persona  #Enviamos el OBJETO
            );
         $this->mostrarVista('persona/frmNuevo.php',$datos);
    }
    public function editar(){
        #Mostramos el Formulario de Editar
        if (isset($_REQUEST['id'])) {
            $persona = new Persona($_REQUEST['id']);
            $persona->leer(false);
            $datos = array(
                'encabezado'=>'Editando Persona: '. $_REQUEST['id'],
                'Persona'=>$persona, 
               );
            $this->mostrarVista('persona/frmEditar.php',$datos);
        } else 
            echo "...El Id a EDITAR es requerido";
    }

}