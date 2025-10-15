<?php
require_once(__DIR__ . "\..\persistencia\Conexion.php");
require_once(__DIR__ . "\..\persistencia\ProductoDAO.php");

class Producto {
    private $id_producto;
    private $nombre;
    private $tamaño;
    private $precioVenta;
    private $imagen;
    private $id_provedor;
    private $id_tipo_producto;

    // Constructor
    public function __construct($id_producto = 0, $nombre = "", $tamaño = "", $precioVenta = 0.0, $imagen = "", $id_provedor = 0, $id_tipo_producto = 0) {
        $this->id_producto = $id_producto;
        $this->nombre = $nombre;
        $this->tamaño = $tamaño;
        $this->precioVenta = $precioVenta;
        $this->imagen = $imagen;
        $this->id_provedor = $id_provedor;
        $this->id_tipo_producto = $id_tipo_producto;
    }

    // Getters y Setters
    public function getIdProducto() {
        return $this->id_producto;
    }

    public function setIdProducto($id_producto) {
        $this->id_producto = $id_producto;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getTamaño() {
        return $this->tamaño;
    }

    public function setTamaño($tamaño) {
        $this->tamaño = $tamaño;
    }

    public function getPrecioVenta() {
        return $this->precioVenta;
    }

    public function setPrecioVenta($precioVenta) {
        $this->precioVenta = $precioVenta;
    }

    public function getImagen() {
        return $this->imagen;
    }

    public function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    public function getIdProvedor() {
        return $this->id_provedor;
    }

    public function setIdProvedor($id_provedor) {
        $this->id_provedor = $id_provedor;
    }

    public function getIdTipoProducto() {
        return $this->id_tipo_producto;
    }

    public function setIdTipoProducto($id_tipo_producto) {
        $this->id_tipo_producto = $id_tipo_producto;
    }

    // Crear (registrar) producto
    public function crear() {
        $conexion = new Conexion();
        $conexion->abrir();
        $productoDAO = new ProductoDAO("", $this->nombre, $this->tamaño, $this->precioVenta, $this->imagen, $this->id_provedor, $this->id_tipo_producto);
        try {
            $conexion->ejecutar($productoDAO->crearProducto());
            $conexion->cerrar();
            return true;
        } catch (Exception $e) {
            return $e;
        }
    }

    // Consultar todos los productos
    public function consultar() {
        $conexion = new Conexion();
        $conexion->abrir();
        $productoDAO = new ProductoDAO();
        $conexion->ejecutar($productoDAO->consultarProductos());
        $productos = array();
        while (($tupla = $conexion->registro()) != null) {
            $producto = new Producto(
                $tupla[0], // id_producto
                $tupla[1], // nombre
                $tupla[2], // tamaño
                $tupla[3], // precioVenta
                $tupla[4], // imagen
                $tupla[5], // id_provedor
                $tupla[6]  // id_tipo_producto
            );
            array_push($productos, $producto);
        }
        $conexion->cerrar();
        return $productos;
    }

    // Consultar producto por ID
    public function consultarPorId() {
        $conexion = new Conexion();
        $conexion->abrir();
        $productoDAO = new ProductoDAO($this->id_producto);
        try {
            $conexion->ejecutar($productoDAO->consultarProductoPorId());
            $tupla = $conexion->registro();
            $conexion->cerrar();
            if ($tupla != null) {
                $this->nombre = $tupla[0];
                $this->tamaño = $tupla[1];
                $this->precioVenta = $tupla[2];
                $this->imagen = $tupla[3];
                $this->id_provedor = $tupla[4];
                $this->id_tipo_producto = $tupla[5];
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return $e;
        }
    }
}
?>
