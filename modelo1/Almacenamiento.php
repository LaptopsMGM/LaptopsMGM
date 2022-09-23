<?php 
require_once SYS . DIRECTORY_SEPARATOR . "Modelo.php";
require_once "TablaInterface.php"; 
require_once PER . DIRECTORY_SEPARATOR . "BaseDeDatos.php"; 
class Almacenamiento extends Modelo implements TablaInterface { 
    private $_id; # Nuestro (PK) 
    private $_almacenamiento; 
    private $_bd; 
    const TABLA = 'almacenamiento'; 
    #Constructor 
    public function __construct($id=null, $almacenamiento=""){ 
        $this->_bd = new BaseDeDatos(new MySQL()); 
        $this->_id = $id; 
        $this->_almacenamiento = $almacenamiento; 
    } 
    # Implementamos lo que dice la INTERFACE 
    public function nuevo(){ 
        $sql = "INSERT INTO ". self::TABLA 
            ." (idalmacenamiento, almacenamiento) VALUES (". 
            $this->_id .",'". $this->_almacenamiento ."'" 
            .");"; 
        return $this->_bd->ejecutar($sql); 
    } 
    public function editar(){ 
        $sql ="UPDATE ". self::TABLA 
        . " SET almacenamiento='".$this->_almacenamiento."'" 
        ." WHERE idalmacenamiento=".$this->_id.";"; 
        return $this->_bd->ejecutar($sql); 
    } 
    public function eliminar(){ 
        $sql ="DELETE FROM ". self::TABLA 
        ." WHERE idalmacenamiento=".$this->_id.";"; 
        return $this->_bd->ejecutar($sql); 
    } 
    public function leer($todo=true){ 
        $sql ="SELECT * FROM ". self::TABLA ; 
        if (!$todo) 
            $sql .=" WHERE idalmacenamiento=".$this->_id.";";
            $datos=$this->_bd->ejecutar($sql); 
        if (!$todo) 
            $this->setPropiedades($datos[0]); 
            return $datos; 
    } 
#Devolvemos las propiedades 
public function getId(){ 
    return $this->_id; 
} 
public function getAlmacenamiento(){ 
    return $this->_almacenamiento; 
} 
private function setPropiedades ($registro){ 
    $this->_id= $registro["idalmacenamiento"]; 
    $this->_almacenamiento=$registro["almacenamiento"]; } 
}