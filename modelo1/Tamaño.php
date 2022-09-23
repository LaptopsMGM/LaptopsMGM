<?php 
require_once SYS . DIRECTORY_SEPARATOR . "Modelo.php";
require_once "TablaInterface.php"; 
require_once PER . DIRECTORY_SEPARATOR . "BaseDeDatos.php"; 
class Tamaño extends Modelo implements TablaInterface { 
    private $_id; # Nuestro (PK) 
    private $_tamaño; 
    private $_bd; 
    const TABLA = 'tamaño'; 
    #Constructor 
    public function __construct($id=null, $tamaño=""){ 
        $this->_bd = new BaseDeDatos(new MySQL()); 
        $this->_id = $id; 
        $this->_tamaño = $tamaño; 
    } 
    # Implementamos lo que dice la INTERFACE 
    public function nuevo(){ 
        $sql = "INSERT INTO ". self::TABLA 
            ." (idtamaño, tamaño) VALUES (". 
            $this->_id .",'". $this->_tamaño ."'" 
            .");"; 
        return $this->_bd->ejecutar($sql); 
    } 
    public function editar(){ 
        $sql ="UPDATE ". self::TABLA 
        . " SET tamaño='".$this->_tamaño."'" 
        ." WHERE idtamaño=".$this->_id.";"; 
        return $this->_bd->ejecutar($sql); 
    } 
    public function eliminar(){ 
        $sql ="DELETE FROM ". self::TABLA 
        ." WHERE idtamaño=".$this->_id.";"; 
        return $this->_bd->ejecutar($sql); 
    } 
    public function leer($todo=true){ 
        $sql ="SELECT * FROM ". self::TABLA ; 
        if (!$todo) 
            $sql .=" WHERE idtamaño=".$this->_id.";";
            $datos=$this->_bd->ejecutar($sql); 
        if (!$todo) 
            $this->setPropiedades($datos[0]); 
            return $datos; 
    } 
#Devolvemos las propiedades 
public function getId(){ 
    return $this->_id; 
} 
public function getTamaño(){ 
    return $this->_tamaño; 
} 
private function setPropiedades ($registro){ 
    $this->_id= $registro["idtamaño"]; 
    $this->_tamaño=$registro["tamaño"]; } 
}