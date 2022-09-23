<?php
require_once SYS . DIRECTORY_SEPARATOR . "Modelo.php";
require_once "TablaInterface.php";
require_once PER . DIRECTORY_SEPARATOR . "BaseDeDatos.php";

class Ram extends Modelo implements TablaInterface {
    private $_id;   # Nuestro (PK)
    private $_ram;
    private $_bd;
    const TABLA = 'ram';
    #Constructor
    public function __construct($id=null, $ram=""){
        $this->_bd = new BaseDeDatos(new MySQL());
        $this->_id = $id;
        $this->_ram = $ram; 
    }
    # Implementamos lo que dice la INTERFACE
    public function nuevo(){
        $sql = "INSERT INTO ". self::TABLA 
            ." (idram, ram) VALUES (".
                $this->_id .",'". $this->_ram ."'"
            .");";
        return $this->_bd->ejecutar($sql);
    }
    public function editar(){
        $sql ="UPDATE ". self::TABLA 
            . " SET ram='".$this->_ram."'"
            ." WHERE idram=".$this->_id.";";
        return $this->_bd->ejecutar($sql);
    }
    public function eliminar(){
        $sql ="DELETE FROM ". self::TABLA 
            ." WHERE idram=".$this->_id.";";
        return $this->_bd->ejecutar($sql);
    }
    public function leer($todo=true){
        $sql ="SELECT * FROM ". self::TABLA ;
        if (!$todo)
            $sql .=" WHERE idram=".$this->_id.";";
        $datos=$this->_bd->ejecutar($sql);
        if (!$todo)
            $this->setPropiedades($datos[0]);
        return $datos;
    }

    #Devolvemos las propiedades
    public function getId(){
        return $this->_id;
    }
    public function getram(){
        return $this->_ram;
    }
    private function setPropiedades ($registro){
        $this->_id= $registro["idram"];
        $this->_ram=$registro["ram"];
    }
}
