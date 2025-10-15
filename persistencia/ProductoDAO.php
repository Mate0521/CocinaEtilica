<?php
class ProductoDAO {
    private $id_producto;
    private $nombre;
    private $tamaño;
    private $precioVenta;
    private $imagen;
    private $id_provedor;
    private $id_tipo_producto;

    public function __construct($id_producto = 0, $nombre = "", $tamaño = "", $precioVenta = 0.0, $imagen = "", $id_provedor = 0, $id_tipo_producto = 0) {
        $this->id_producto = $id_producto;
        $this->nombre = $nombre;
        $this->tamaño = $tamaño;
        $this->precioVenta = $precioVenta;
        $this->imagen = $imagen;
        $this->id_provedor = $id_provedor;
        $this->id_tipo_producto = $id_tipo_producto;
    }

    // Método para crear (registrar) un producto
    public function crearProducto() {
        return "INSERT INTO producto (nombre, tamaño, precioVenta, imagen, id_provedor, id_tipo_producto)
                VALUES ('" . $this->nombre . "', 
                        '" . $this->tamaño . "', 
                        '" . $this->precioVenta . "', 
                        '" . $this->imagen . "', 
                        '" . $this->id_provedor . "', 
                        '" . $this->id_tipo_producto . "')";
    }

    // (Opcional) Método para consultar todos los productos
    public function consultarProductos() {
        return "SELECT id_producto, nombre, tamaño, precioVenta, imagen, id_provedor, id_tipo_producto 
                FROM producto";
    }

    // (Opcional) Método para consultar un producto específico
    public function consultarProductoPorId() {
        return "SELECT nombre, tamaño, precioVenta, imagen, id_provedor, id_tipo_producto
                FROM producto
                WHERE id_producto = '" . $this->id_producto . "'";
    }
}
?>
