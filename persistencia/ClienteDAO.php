<?php
class ClienteDAO {
    private $id;
    private $nombre;
    private $apellido;
    private $fechaNacimiento;
    private $correo;
    private $clave;
    private $estado;

    public function __construct($id=0, $nombre="", $apellido="", $fechaNacimiento="", $correo="", $clave="", $estado=0){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> fechaNacimiento = $fechaNacimiento;
        $this -> correo = $correo;
        $this -> clave = $clave;
        $this -> estado = $estado;
    }
    
    public function registrar(){
        return "insert into Cliente(nombre, apellido, fechaNacimiento, correo, clave)
                values ('" . $this -> nombre . "', '" . $this -> apellido . "', '" . $this -> fechaNacimiento . "', '" . $this -> correo . "', md5('" . $this -> clave . "'))";
    }

    public function consultar(){
        return "select idCliente, nombre, apellido, fechaNacimiento, correo, estado
                from Cliente";
    }

    public function consultarPorID(){
        return "select nombre, apellido, fechaNacimiento, correo
                from Cliente
                where idCliente = '" . $this -> id . "'";
    }
    public function autenticar(){
        return "select idCliente
                from Cliente
                where correo = '" . $this -> correo . "' and clave = md5('" . $this -> clave . "')";
    }
    public function cambiarEstado(){
        return "UPDATE `cliente` 
                SET `estado`= '$this->estado' 
                WHERE `idCliente`= $this->id";
    }
}

