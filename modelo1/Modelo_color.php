<?php 
require_once SYS . DIRECTORY_SEPARATOR . "Modelo.php";
require_once "TablaInterface.php"; 
require_once PER . DIRECTORY_SEPARATOR . "BaseDeDatos.php"; 
class modelo_color extends Modelo implements TablaInterface { 
    private $_id; # Nuestro (PK) 
    private $_modelo_color; 
    private $_modelo; 
    private $_bd; 
    const TABLA = 'modelo_color'; 
    #Constructor 
    public function __construct($id=null
                    , $modelo_color=null
                    , $modelo=null){ 
        $this->_bd = new BaseDeDatos(new MySQL()); 
        $this->_id = $id; 
        $this->_modelo_color = $modelo_color; 
        $this->_modelo = $modelo; 
    } 
    # Implementamos lo que dice la INTERFACE 
    public function nuevo(){ 
        $sql = "INSERT INTO ". self::TABLA 
            ." (idmodelocolor, color_idcolor,modelo_idmodelo) VALUES (". 
            $this->_id .",'". $this->_modelo_color ."'" 
            .",'". $this->_modelo ."'" 
            .");"; 
        return $this->_bd->ejecutar($sql); 
    } 
    public function editar(){ 
        $sql ="UPDATE ". self::TABLA 
        . " SET color_idcolor='".$this->_modelo_color."'" 
        ." WHERE idmodelocolor=".$this->_id.";"; 
        return $this->_bd->ejecutar($sql); 
    } 
    public function eliminar(){ 
        $sql ="DELETE FROM ". self::TABLA 
        ." WHERE idmodelo_color=".$this->_id.";"; 
        return $this->_bd->ejecutar($sql); 
    } 
    public function leer($todo=true){ 
        #$sql ="SELECT * FROM ". self::TABLA ; 
        $sql = "SELECT mc.idmodelocolor, mc.color_idcolor,mc.modelo_idmodelo,c.color, m.modelo ";
        $sql .= "FROM modelo_color mc INNER JOIN color c ON mc.color_idcolor=c.idcolor ";
        $sql .= " INNER JOIN modelo m ON mc.modelo_idmodelo=m.idmodelo";
        if (!$todo) 
            $sql .=" WHERE idmodelocolor=".$this->_id.";";
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
public function getModelo_color(){ 
    return $this->_modelo_color; 
} 
private function setPropiedades ($registro){ 
    $this->_id= $registro["idmodelocolor"]; 
    $this->_modelo_color=$registro["modelo_idmodelo"]; } 
}