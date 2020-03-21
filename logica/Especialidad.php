<?php
require 'persistencia/EspecialidadDAO.php';
require_once 'persistencia/Conexion.php';

class Especialidad {
    private $id;
    private $nombre;
    private $EspecialidadDAO;
    private $conexion;
    
    function getId(){
        return $this -> id;
    }
    
    function getNombre(){
        return $this -> nombre;
    }
    
    function Especialidad($id="", $nombre=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> conexion = new Conexion();
        $this -> EspecialidadDAO = new EspecialidadDAO($id, $nombre);
    }
    
    function registrar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> EspecialidadDAO -> registrar());
        $this -> conexion -> cerrar();
    }
    
    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> EspecialidadDAO -> consultar());
        $resultado = $this -> conexion -> extraer();
        $this -> id = $resultado[0];
        $this -> conexion -> cerrar();
    }
    
    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> EspecialidadDAO -> consultarTodos());
        $resultados = array();
        $i = 0;
        while (($registro = $this -> conexion -> extraer()) != null) {
            $resultados[$i] = new Especialidad($registro[0],$registro[1]);
            $i++;
        }
        $this -> conexion -> cerrar();
        return $resultados;
    }
}
?>