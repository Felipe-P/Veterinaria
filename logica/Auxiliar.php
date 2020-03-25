<?php
require 'persistencia/AuxiliarDAO.php';
require_once 'persistencia/Conexion.php';

class Auxiliar extends Persona{
    
    private $disponibilidad;
    private $auxiliarDAO;
    private $conexion;
    
    function getDisponibilidad(){
        return $this -> disponibilidad;
    }
    function setDisponibilidad($disponibilidad){
        $this -> disponibilidad= $disponibilidad;
    }
    
    function Auxiliar($id="", $nombre="", $apellido="", $correo="", $clave="", $disponibilidad=""){
        $this -> Persona($id, $nombre, $apellido, $correo, $clave);
        $this -> disponibilidad = $disponibilidad;
        $this -> conexion = new Conexion();
        $this -> auxiliarDAO = new AuxiliarDAO($id, $nombre, $apellido, $correo, $clave, $disponibilidad );
    }
    
    function filtro($filtro){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> auxiliarDAO -> filtrar($filtro));
        $resultados = array();
        $i = 0;
        while (($registro = $this -> conexion -> extraer()) != null) {
            $resultados[$i] = new Auxiliar($registro[0],$registro[1],$registro[2],$registro[3], "",$registro[4]);
            $i++;
        }
        $this -> conexion -> cerrar();
        return $resultados;
    }
    
    function registrar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> auxiliarDAO -> registrar());
        $this -> conexion -> cerrar();
    }
    
    function actualizar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> auxiliarDAO -> actualizar());
        $this -> conexion -> cerrar();
    }
    function actualizarDisponibilidad($estado){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> auxiliarDAO -> actualizarDisponbilidad($estado));
        $this -> conexion -> cerrar();
    }
    
    function autenticar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> auxiliarDAO -> autenticar());
        if($this -> conexion -> numFilas() == 1){
            $resultado = $this -> conexion -> extraer();
            $this -> id = $resultado[0];
            $this -> conexion -> cerrar();
            return true;
        } else {
            $this -> conexion -> cerrar();
            return false;
        }
    }
    
    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> auxiliarDAO -> consultar());
        $resultado = $this -> conexion -> extraer();
        $this -> nombre = $resultado[0];
        $this -> apellido = $resultado[1];
        $this -> correo = $resultado[2];
        $this -> disponibilidad = $resultado[3];
        $this -> conexion -> cerrar();
    }
    function consultarCantidad(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> auxiliarDAO -> consultarCantidad());
        $resultado = $this -> conexion -> extraer();
        $this -> conexion -> cerrar();
        return $resultado[0];
    }
     
    
    function existeCorreo(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> auxiliarDAO -> existeCorreo());
        if($this -> conexion -> numFilas() == 0){
            $this -> conexion -> cerrar();
            return false;
        } else {
            $this -> conexion -> cerrar();
            return true;
        }
    }
    
    
    function consultarDisponibles(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> auxiliarDAO -> consultarDisponibles());
        $resultados = array();
        $i = 0;
        while (($registro = $this -> conexion -> extraer()) != null) {
            $resultados[$i] = new Auxiliar($registro[0],$registro[1],$registro[2],$registro[3], "",$registro[4]);
            $i++;
        }
        $this -> conexion -> cerrar();
        return $resultados;
    }
    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> auxiliarDAO -> consultarTodos());
        $resultados = array();
        $i = 0;
        while (($registro = $this -> conexion -> extraer()) != null) {
            $resultados[$i] = new Auxiliar($registro[0],$registro[1],$registro[2],$registro[3], "",$registro[4]);
            $i++;
        }
        $this -> conexion -> cerrar();
        return $resultados;
    }
    function losMasTrabajadores(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> auxiliarDAO -> losMasTrabajadores());
        $resultados = array();
        $i = 0;
        while (($registro = $this -> conexion -> extraer()) != null) {
            $resultados[$i][0] = $registro[0];
            $resultados[$i][1] = $registro[1];
            $resultados[$i][2] = $registro[2];
            $i++;
        }
        $this -> conexion -> cerrar();
        return $resultados;
    }
}