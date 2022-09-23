<?php 
require_once SYS . DIRECTORY_SEPARATOR . "Modelo.php";
require_once "TablaInterface.php"; 
require_once PER . DIRECTORY_SEPARATOR . "BaseDeDatos.php"; 
class Modelo_almacenamiento extends Modelo implements TablaInterface { 
    private $_id; # Nuestro (PK) 
    private $_modelo_almacenamiento; 
    private $_bd; 
    const TABLA = 'modelo_almacenamiento'; 
    #Constructor 
    public function __construct($id=null, $modelo_almacenamiento=""){ 
        $this->_bd = new BaseDeDatos(new MySQL()); 
        $this->_id = $id; 
        $this->_modelo_almacenamiento = $modelo_almacenamiento; 
    } 
    # Implementamos lo que dice la INTERFACE 
    public function nuevo(){ 
        $sql = "INSERT INTO ". self::TABLA 
            ." (idmodelo_almacenamiento, modelo_almacenamiento) VALUES (". 
            $this->_id .",'". $this->_modelo_almacenamiento ."'" 
            .");"; 
        return $this->_bd->ejecutar($sql); 
    } 
    public function editar(){ 
        $sql ="UPDATE ". self::TABLA 
        . " SET modelo_almacenamiento='".$this->_modelo_almacenamiento."'" 
        ." WHERE idmodelo_almacenamiento=".$this->_id.";"; 
        return $this->_bd->ejecutar($sql); 
    } 
    public function eliminar(){ 
        $sql ="DELETE FROM ". self::TABLA 
        ." WHERE idmodelo_almacenamiento=".$this->_id.";"; 
        return $this->_bd->ejecutar($sql); 
    } 
    public function leer($todo=true){ 
        $sql ="SELECT * FROM ". self::TABLA ; 
        if (!$todo) 
            $sql .=" WHERE idmodelo_almacenamiento=".$this->_id.";";
            $datos=$this->_bd->ejecutar($sql); 
        if (!$todo) 
            $this->setPropiedades($datos[0]); 
            return $datos; 
    } 
#Devolvemos las propiedades 
public function getId(){ 
    return $this->_id; 
} 
public function getModelo_almacenamiento(){ 
    return $this->_modelo_almacenamiento; 
} 
private function setPropiedades ($registro){ 
    $this->_id= $registro["idmodelo_almacenamiento"]; 
    $this->_modelo_almacenamiento=$registro["modelo_almacenamiento"]; } 
}