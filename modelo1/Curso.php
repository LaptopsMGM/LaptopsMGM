<?php
require_once PER . DIRECTORY_SEPARATOR . "BaseDeDatos.php";

class Curso { 
    private $_pk; #Clave Primaria}
    private $_nombre;
    private $_duracion;
    private $_creditos;
    private $_bd;
    const TABLA="cursos";
    #Contructor
    public function __construct($pk=null,$n="",$c=0,$d=""){
        $this->_pk=$pk;
        $this->_nombre=$n;
        $this->_creditos=$c;
        $this->_duracion=$d;

        $this->_bd = new BaseDeDatos(new MySQL());
    }
    public function mostrar(){
        $sql ="SELECT * FROM ". self::TABLA ;
        if ($this->_pk != null) #devuelve un solo Registro
            $sql .=" WHERE id=".$this->_pk.";";
        return $this->_bd->ejecutar($sql);
    }

    public function eliminar(){
        $sql ="DELETE FROM ". self::TABLA 
            ." WHERE id=".$this->_pk.";";
        return $this->_bd->ejecutar($sql);
    }

    public function editar(){
        $sql ="UPDATE ". self::TABLA 
            . " SET nombre='".$this->_nombre."', creditos=".$this->_creditos
            . ", duracion='".$this->_duracion ."'"
            ." WHERE id=".$this->_pk.";";
        var_dump($sql);
        return $this->_bd->ejecutar($sql);
    }

    public function nuevo(){
        $sql = "INSERT INTO ". self::TABLA 
            ." (id, nombre, creditos, duracion) VALUES (".
                $this->_pk .",'". $this->_nombre ."',"
                .$this->_creditos .",'".$this->_duracion ."'"
            .");";
        return $this->_bd->ejecutar($sql);
    }
}