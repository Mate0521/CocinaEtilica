<?php

class ProductoDAO{
    private $id;
    private $nombre;
    private $tamano;
    private $precio;
    private $imagen;
    private $proveedor;
    private $tipoProducto;

    public function __construct($id=0, $nombre="", $tamano=0, $precio=0, $imagen="", $proveedor=0, $tipoProducto=0){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> tamano = $tamano;
        $this -> precio = $precio;
        $this -> imagen = $imagen;
        $this -> proveedor = $proveedor;
        $this -> tipoProducto = $tipoProducto;
    }
    public function crear(){
        return "insert into Producto(nombre, tamano, precioVenta, imagen, Proveedor_idProveedor, TipoProducto_idTipoProducto)
                values ('" . $this -> nombre . "', " . $this -> tamano . ", " . $this -> precio . ", '" . $this -> imagen . "', " . $this -> proveedor . ", " . $this -> tipoProducto . ")";
    }
    public function consultar(){
        return "select idProducto, nombre, tamano, precioVenta, imagen, Proveedor_idProveedor, TipoProducto_idTipoProducto
                from Producto";
    }
    public function consultarProv(){
        return "select idProveedor, nombre
                from Proveedor";
    }
    public function actualizar(){
        return "UPDATE `producto` 
                SET `nombre`='$this->nombre',`tamano`='$this->tamano',`precioVenta`='$this->precio',`imagen`='$this->imagen',`Proveedor_idProveedor`='$this->proveedor',`TipoProducto_idTipoProducto`='$this->tipoProducto' 
                WHERE `idProducto`= $this->id";
    }
}
?>