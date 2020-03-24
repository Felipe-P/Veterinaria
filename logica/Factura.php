<?php
require 'persistencia/FacturaDAO.php';
require_once 'persistencia/Conexion.php';

class Factura {
    private $id;
    private $precio;
    private $fecha;
    private $hora;
    private $FacturaDAO;
    private $conexion;
    
    function getId(){
        return $this -> id;
    }
    
    function getPrecio(){
        return $this -> precio;
    }
    
    function getFecha(){
        return $this -> fecha;
    }
    function getHora(){
        return $this -> hora;
    }
    function Factura($id="", $precio="", $fecha="", $hora=""){
        $this -> id = $id;
        $this -> precio = $precio;
        $this -> fecha = $fecha;
        $this -> hora = $hora;
        $this -> conexion = new Conexion();
        $this -> FacturaDAO = new FacturaDAO($id, $precio,$fecha, $hora);
    }
    
    function registrar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> FacturaDAO -> registrar());
        $this -> conexion -> cerrar();
    }
    
    function consultarId(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> FacturaDAO -> consultariD());
        $resultado = $this -> conexion -> extraer();
        $this -> id = $resultado[0];
        $this -> conexion -> cerrar();
    }
    
    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> FacturaDAO -> consultarTodos());
        $resultados = array();
        $i = 0;
        while (($registro = $this -> conexion -> extraer()) != null) {
            $resultados[$i] = new Factura($registro[0],$registro[1]);
            $i++;
        }
        $this -> conexion -> cerrar();
        return $resultados;
    }
}
?>