<?php
require_once(__DIR__ ."\..\persistencia\ClienteDAO.php");
require_once(__DIR__."\Persona.php");
require_once(__DIR__ ."\..\persistencia\Conexion.php");

class Cliente extends Persona {
    private $fechaNacimiento;
    private $estado;
    
    /**
     * @return mixed
     */
    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    /**
     * @param mixed $fechaNacimiento
     */
    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;
    }

    public function getEstado()
    {
        return $this->estado;
    }
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function __construct($id=0, $nombre="", $apellido="", $correo="", $clave="", $fechaNacimiento="", $estado=0){
        parent::__construct($id, $nombre, $apellido, $correo, $clave);
        $this -> fechaNacimiento = $fechaNacimiento;
        $this -> estado = $estado;
    }
    
    public function registrar(){
        $conexion = new Conexion();
        $conexion -> abrir();
        $clienteDAO = new ClienteDAO("", $this -> nombre, $this -> apellido, $this -> fechaNacimiento, $this -> correo, $this -> clave);        
        $conexion -> ejecutar($clienteDAO -> registrar());
        $conexion -> cerrar();
    }
    
    public function consultar(){
        $conexion = new Conexion();
        $conexion -> abrir();
        $clienteDAO = new ClienteDAO();
        $conexion -> ejecutar($clienteDAO -> consultar());
        $clientes = array();
        while(($tupla = $conexion -> registro()) != null){
            $cliente = new Cliente($tupla[0], $tupla[1], $tupla[2], $tupla[4], "", $tupla[3], $tupla[5]);
            array_push($clientes, $cliente);
        }
        $conexion -> cerrar();
        return $clientes;
    }
        
    public function autenticar(){
        $conexion = new Conexion();
        $conexion -> abrir();
        $clienteDAO = new ClienteDAO("", "", "", "", $this -> correo, $this -> clave);
        $conexion -> ejecutar($clienteDAO -> autenticar());
        $tupla = $conexion -> registro();
        $conexion -> cerrar();
        if($tupla != null){
            $this -> id = $tupla[0];
            return true;
        }else{
            return false;
        }
    }
    
    public function consultarPorId(){
        $conexion = new Conexion();
        $conexion -> abrir();
        $clienteDAO = new ClienteDAO($this -> id);
        $conexion -> ejecutar($clienteDAO -> consultarPorId());
        $tupla = $conexion -> registro();
        $conexion -> cerrar();
        $this -> nombre = $tupla[0];
        $this -> apellido = $tupla[1];
        $this -> correo = $tupla[2];
    }

    public function cambiarEstado(){
        $this -> estado==1 ? $this -> estado=0 : $this -> estado=1;
        $conexion = new Conexion();
        $conexion -> abrir();
        $clienteDAO = new ClienteDAO($this -> id, "", "", "", "", "", $this -> estado);
        $sql = $clienteDAO -> cambiarEstado();
        $conexion -> ejecutar($sql);
        $conexion -> filasAfectadas()!=1?($this -> estado==1?$this -> estado=0:$this -> estado=1):null;
        $conexion -> cerrar();
    }
}



?>