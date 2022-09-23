<?php 
require_once SYS . DIRECTORY_SEPARATOR . "Modelo.php";
require_once "TablaInterface.php"; 
require_once PER . DIRECTORY_SEPARATOR . "BaseDeDatos.php"; 
class modelo_camara extends Modelo implements TablaInterface { 
    private $_id; # Nuestro (PK) 
    private $_modelo_camara; 
    private $_modelo; 
    private $_bd; 
    const TABLA = 'modelo_camara'; 
    #Constructor 
    public function __construct($id=null
                    , $modelo_camara=null
                    , $modelo=null){ 
        $this->_bd = new BaseDeDatos(new MySQL()); 
        $this->_id = $id; 
        $this->_modelo_camara = $modelo_camara; 
        $this->_modelo = $modelo; 
    } 
    # Implementamos lo que dice la INTERFACE 
    public function nuevo(){ 
        $sql = "INSERT INTO ". self::TABLA 
            ." (idmodelocamara, camara_idcamara,modelo_idmodelo) VALUES (". 
            $this->_id .",'". $this->_camara_idcamara ."'" 
            .",'". $this->_modelo_idmodelo ."'" 
            .");"; 
        return $this->_bd->ejecutar($sql); 
    } 
    public function editar(){ 
        $sql ="UPDATE ". self::TABLA 
        . " SET camara_idcamara='".$this->_modelo_camara."'" 
        ." WHERE idmodelocamara=".$this->_id.";"; 
        return $this->_bd->ejecutar($sql); 
    } 
    public function eliminar(){ 
        $sql ="DELETE FROM ". self::TABLA 
        ." WHERE idmodelocamara=".$this->_id.";"; 
        return $this->_bd->ejecutar($sql); 
    } 
    public function leer($todo=true){ 
        #$sql ="SELECT * FROM ". self::TABLA ; 
        $sql = "SELECT mc.idmodelocamara, mc.camara_idcamara,mc.modelo_idmodelo,c.camara, m.modelo ";
        $sql .= "FROM modelo_camara mc INNER JOIN camara c ON mc.camara_idcamara=c.idcamara ";
        $sql .= " INNER JOIN modelo m ON mc.modelo_idmodelo=m.idmodelo";
        if (!$todo) 
            $sql .=" WHERE idmodelocamara=".$this->_id.";";
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
public function getModelo_camara(){ 
    return $this->_modelo_camara; 
} 
private function setPropiedades ($registro){ 
    $this->_id= $registro["idmodelocamara"]; 
    $this->_modelo_camara=$registro["modelo_idmodelo"]; } 
}