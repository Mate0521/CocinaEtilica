<?php
require_once(__DIR__."\..\persistencia\Conexion.php");
require_once(__DIR__."\..\persistencia\AdminDAO.php");
require_once("Persona.php");

class Admin extends Persona {

    public function __construct($id=0, $nombre="", $apellido="", $correo="", $clave=""){
        parent::__construct($id, $nombre, $apellido, $correo, $clave);
    }
    
    public function obtenerAdmin(){
        $conexion = new Conexion();
        $conexion -> abrir();
        $adminDAO = new AdminDAO($this->id, "", "", $this -> correo, $this -> clave);
        $conexion -> ejecutar($adminDAO -> obtenerAdmin());
        $tupla = $conexion -> registro();
        $conexion -> cerrar();
        if($tupla != null){
            $this -> nombre = $tupla[0];
            $this->apellido= $tupla[1];
            $this->correo=$tupla[2];
        }else{
            return null;

        }
    }

    public function autenticar(){
        $conexion = new Conexion();
        $conexion -> abrir();
        $adminDAO = new AdminDAO("", "", "", $this -> correo, $this -> clave);
        $conexion -> ejecutar($adminDAO -> autenticar());
        $tupla = $conexion -> registro();
        $conexion -> cerrar();
        if($tupla != null){
            $this -> id = $tupla[0];
            return true;
        }else{
            return false;
        }
    }
        
}


?>