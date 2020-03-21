<?php
require 'persistencia/AuxiliarDAO.php';
require_once 'persistencia/Conexion.php';

class Auxiliar extends Persona{
    
    private $disponible;
    private $auxiliarDAO;
    private $conexion;
    
    
    function getDsiponible(){
        return $this -> disponible;
    }
    function Auxiliar($id="", $nombre="", $apellido="", $correo="", $clave="",$disponible=""){
        $this -> Persona($id, $nombre, $apellido, $correo, $clave);
        $this -> disponible = $disponible;
        $this -> conexion = new Conexion();
        $this -> auxiliarDAO = new AuxiliarDAO($id, $nombre, $apellido, $correo, $clave, $disponible );
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
        $this -> disponible = $resultado[3];
        $this -> conexion -> cerrar();
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
}