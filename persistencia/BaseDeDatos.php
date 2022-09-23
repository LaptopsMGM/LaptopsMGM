<?php
require_once PER . DIRECTORY_SEPARATOR . 'ManejadorBaseDeDatosInterface.php';
require_once PER . DIRECTORY_SEPARATOR . 'MySQL.php';
class BaseDeDatos {
    private $_manejador;
    public function __construct(ManejadorBaseDeDatosInterface $manejador){
        $this->_manejador  = $manejador;
    }
    public function ejecutar($sql){
        $this->_manejador->conectar();
        $retorno = $this->_manejador->traerDatos($sql);
        $this->_manejador->desconectar();
        return $retorno;
    }
}