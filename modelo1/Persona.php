<?php
require_once SYS . DIRECTORY_SEPARATOR . "Modelo.php";
require_once "TablaInterface.php";
require_once PER . DIRECTORY_SEPARATOR . "BaseDeDatos.php";

class Persona extends Modelo implements TablaInterface {
    private $_id;   # Nuestro (PK)
    private $_nombres;
    private $_apellidos;
    private $_dni;
    private $_urlMINSA;
    private $_carrera;
    private $_tipoPersona;
    private $_semestre;
    private $_colVacunas;
    private $_bd;
    const TABLA = 'personas';
    #Constructor
    public function __construct($id=null, $nombres=null,$apellidos=null,
                    $dni=null,$urlMinsa=null,$tipoPersona=null,
                    $semestre=null,$tipoPersona=null,$carrera=null){
        $this->_bd = new BaseDeDatos(new MySQL());
        $this->_id = $id;
        $this->_nombres = $nombres; 
        $this->_apellidos = $apellidos; 
        $this->_dni = $dni; 
        $this->_urlMINSA = $urlMinsa; 
        $this->_tipoPersona = new TipoPersona($tipoPersona); 
        $this->_semestre = new Semestre($semestre); 
        $this->_colVacunas; 
        $this->_carrera = new Carrera ($carrera); 
    }
    # Implementamos lo que dice la INTERFACE
    public function nuevo(){
        $sql = "INSERT INTO ". self::TABLA 
            ." (idpersonas, nombres, apellidos, urlminsa, dni, idtipos, idcarreras) VALUES ("
                . $this->_id .",'". $this->_nombres ."','"
                . $this->_apellidos ."',". $this->_dni->gedId() .",". $this->_dni->gedId() .","
                . $this->_tipoPersona->gedId() .",'" . $this->_carrera ."'";
                . $this->_semestre->gedId() .",'" . $this->_carrera ."'";
                . $this->_colVacunas->gedId() .",'" . $this->_carrera ."'";
            .");";
        return $this->_bd->ejecutar($sql);
    }
    public function editar(){
        $sql ="UPDATE ". self::TABLA 
            . " SET nombres='".$this->_nombres."'"
            .", apellidos='".$this->_apellidos."'"
            .", urlminsa='".$this->_urlMINSA ."'"
            .", dni='".$this->_dni ."'"
            .", idtipos=".$this->_tipoPersona->gedId() 
            .", idcarreras=".$this->_carrera->getId()
            .", idsemestres=".$this->_semestre->getId()
            ." WHERE idpersonas=".$this->_id.";";
        return $this->_bd->ejecutar($sql);
    }
    public function eliminar(){
        $sql ="DELETE FROM ". self::TABLA 
            ." WHERE idpersonas=".$this->_id.";";
        return $this->_bd->ejecutar($sql);
    }
    public function leer($todo=true){
        $sql ="SELECT p.nombres, p.apellidos, t.tipo, d.nombre, p.idcarreras FROM ". self::TABLA ." v " 
            . "INNER JOIN ";

        if (!$todo)
            $sql .=" WHERE idpersonas=".$this->_id.";";
        $datos=$this->_bd->ejecutar($sql);
        if (!$todo)
            $this->setPropiedades($datos[0]);
        return $datos;
    }
    public function leerVacunas(){
        $vacunas = new Vacuna();
        return $vacunas->leer(false); 
    }
    #Devolvemos las propiedades
    public function getId(){
        return $this->_id;
    }
    public function getTipoPersona(){
        return $this->_tipoPersona;
    }
    public function getCarrera(){
        return $this->_carrera;
    }
    public function getSemestre(){
        return $this->_semestre;
    }
    public function getVacunas(){
        return $this->_colVacunas;
    }
    private function setPropiedades ($registro){
        $this->_id= $registro["idpersonas"];
        $this->_nombres=$registro["nombres"];
        $this->_apellidos=$registro["apellidos"];
        $this->_dni=$registro["dni"];
        $this->_urlMINSA=$registro["urlminsa"];
        $this->_tipoPersona= new TipoPersona($registro["idtipos"]);
        $this->_carrera= new Carrera($registro["idcarreras"]);
        $this->_semestre= new Semestre($registro["idsemestre"]);
        #recuperamos las Vacunas
        $vacunas = new Vacuna();
        $vacunas->setPersona(new Persona ($registro["idpersonas"]));
        $this->colVacunas = $vacunas->getVacunasPersona();
    }
}
