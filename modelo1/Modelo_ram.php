<?php 
require_once SYS . DIRECTORY_SEPARATOR . "Modelo.php";
require_once "TablaInterface.php"; 
require_once PER . DIRECTORY_SEPARATOR . "BaseDeDatos.php"; 
class modelo_ram extends Modelo implements TablaInterface { 
    private $_id; # Nuestro (PK) 
    private $_modelo_ram; 
    private $_modelo; 
    private $_bd; 
    const TABLA = 'modelo_ram'; 
    #Constructor 
    public function __construct($id=null
                    , $modelo_ram=null
                    , $modelo=null){ 
        $this->_bd = new BaseDeDatos(new MySQL()); 
        $this->_id = $id; 
        $this->_modelo_ram = $modelo_ram; 
        $this->_modelo = $modelo; 
    } 
    # Implementamos lo que dice la INTERFACE 
    public function nuevo(){ 
        $sql = "INSERT INTO ". self::TABLA 
            ." (idmodelo_ram, ram_idram,modelo_idmodelo) VALUES (". 
            $this->_id .",'". $this->_modelo_ram ."'" 
            .",'". $this->_modelo ."'" 
            .");"; 
        return $this->_bd->ejecutar($sql); 
    } 
    public function editar(){ 
        $sql ="UPDATE ". self::TABLA 
        . " SET ram_idram='".$this->_modelo_ram."'" 
        ." WHERE idmodelo_ram=".$this->_id.";"; 
        return $this->_bd->ejecutar($sql); 
    } 
    public function eliminar(){ 
        $sql ="DELETE FROM ". self::TABLA 
        ." WHERE idmodelo_ram=".$this->_id.";"; 
        return $this->_bd->ejecutar($sql); 
    } 
    public function leer($todo=true){ 
        #$sql ="SELECT * FROM ". self::TABLA ; 
        $sql = "SELECT mc.idmodelo_ram, mc.ram_idram,mc.modelo_idmodelo,c.ram, m.modelo ";
        $sql .= "FROM modelo_ram mc INNER JOIN ram c ON mc.ram_idram=c.idram ";
        $sql .= " INNER JOIN modelo m ON mc.modelo_idmodelo=m.idmodelo";
        if (!$todo) 
            $sql .=" WHERE idmodelo_ram=".$this->_id.";";
        # var_dump ($sql); exit();
        $datos=$this->_bd->ejecutar($sql); 
        if (!$todo) 
            $this->setPropiedades($datos[0]); 
            return $datos; 
    } 
#Devolvemos las propiedades 
public function getId(){ 
    return $this->_id; 
} 
public function getModelo_ram(){ 
    return $this->_modelo_ram; 
} 
private function setPropiedades ($registro){ 
    $this->_id= $registro["idmodelo_ram"]; 
    $this->_modelo_ram=$registro["modelo_idmodelo"]; } 
}