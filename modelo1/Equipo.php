<?php 
require_once SYS . DIRECTORY_SEPARATOR . "Modelo.php";
require_once "TablaInterface.php"; 
require_once PER . DIRECTORY_SEPARATOR . "BaseDeDatos.php"; 
class Equipo extends Modelo implements TablaInterface { 
    private $_id; # Nuestro (PK) 
    private $_equipo; 
    private $_bd; 
    const TABLA = 'equipo'; 
    #Constructor 
    public function __construct($id=null, $equipo=""){ 
        $this->_bd = new BaseDeDatos(new MySQL()); 
        $this->_id = $id; 
        $this->_equipo = $equipo; 
    } 
    # Implementamos lo que dice la INTERFACE 
    public function nuevo(){ 
        $sql = "INSERT INTO ". self::TABLA 
            ." (idequipo, equipo) VALUES (". 
            $this->_id .",'". $this->_equipo ."'" 
            .");"; 
        return $this->_bd->ejecutar($sql); 
    } 
    public function editar(){ 
        $sql ="UPDATE ". self::TABLA 
        . " SET equipo='".$this->_equipo."'" 
        ." WHERE idequipo=".$this->_id.";"; 
        return $this->_bd->ejecutar($sql); 
    } 
    public function eliminar(){ 
        $sql ="DELETE FROM ". self::TABLA 
        ." WHERE idequipo=".$this->_id.";"; 
        return $this->_bd->ejecutar($sql); 
    } 
    public function leer($todo=true){ 
        $sql ="SELECT * FROM ". self::TABLA ; 
        if (!$todo) 
            $sql .=" WHERE idequipo=".$this->_id.";";
            $datos=$this->_bd->ejecutar($sql); 
        if (!$todo) 
            $this->setPropiedades($datos[0]); 
            return $datos; 
    } 
#Devolvemos las propiedades 
public function getId(){ 
    return $this->_id; 
} 
public function getEquipo(){ 
    return $this->_equipo; 
} 
private function setPropiedades ($registro){ 
    $this->_id= $registro["idequipo"]; 
    $this->_equipo=$registro["equipo"]; } 
}