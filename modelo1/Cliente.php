<?php
require_once SYS . DIRECTORY_SEPARATOR . "Modelo.php";
require_once "TablaInterface.php";
require_once PER . DIRECTORY_SEPARATOR . "BaseDeDatos.php";

class Cliente extends Modelo implements TablaInterface {
    private $_id;   # Nuestro (PK)
    private $_cliente;
    private $_apellido;
    private $_DNI;
    private $_genero;
    private $_bd;
    const TABLA = 'cliente';
    #Constructor
    public function __construct($id=null, $cliente=""){
        $this->_bd = new BaseDeDatos(new MySQL());
        $this->_id = $id;



        $this->_cliente = $cliente; 
    }
    # Implementamos lo que dice la INTERFACE
    public function nuevo(){
        $sql = "INSERT INTO ". self::TABLA 
            ." (idcliente, cliente) VALUES (".
                $this->_id .",'". $this->_cliente ."'"
            .");";
        return $this->_bd->ejecutar($sql);
    }
    public function editar(){
        $sql ="UPDATE ". self::TABLA 
            . " SET cliente='".$this->_cliente."'"
            ." WHERE idcliente=".$this->_id.";";
        return $this->_bd->ejecutar($sql);
    }
    public function eliminar(){
        $sql ="DELETE FROM ". self::TABLA 
            ." WHERE idcliente=".$this->_id.";";
        return $this->_bd->ejecutar($sql);
    }
    public function leer($todo=true){
        $sql ="SELECT * FROM ". self::TABLA ;
        if (!$todo)
            $sql .=" WHERE idcliente=".$this->_id.";";
        $datos=$this->_bd->ejecutar($sql);
        if (!$todo)
            $this->setPropiedades($datos[0]);
        return $datos;
    }
    //JSon ----------------------------- ejemplo
    public function consulta1($todo=true){
        $sql ="SELECT idCliente, nombre, apellido , genero FROM ". self::TABLA ;
        if (!$todo)
            $sql .=" WHERE idcliente=".$this->_id.";";
        $datos=$this->_bd->ejecutar($sql);
        if (!$todo)
            $this->setPropiedades($datos[0]);
        return $datos;
    }

    #Devolvemos las propiedades
    public function getId(){
        return $this->_id;
    }
    public function getCliente(){
        return $this->_cliente;
    }
    private function setPropiedades ($registro){
        $this->_id= $registro["idcliente"];
        $this->_cliente=$registro["cliente"];
    }
}