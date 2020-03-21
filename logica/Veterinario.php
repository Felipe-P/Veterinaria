<?php
require 'persistencia/VeterinarioDAO.php';
require_once 'persistencia/Conexion.php';

class Veterinario extends Persona{
    private $especialidad;
    private $disponible;
    private $veterinarioDAO;
    private $conexion;
    
    function getEspecialidad(){
        return $this -> especialidad;
    }
    function getDsiponible(){
        return $this -> disponible;
    }
    function Veterinario($id="", $nombre="", $apellido="", $correo="", $clave="", $especialidad="", $disponible=""){
        $this -> Persona($id, $nombre, $apellido, $correo, $clave);
        $this -> especialidad = $especialidad;
        $this -> disponible = $disponible;
        $this -> conexion = new Conexion();
        $this -> veterinarioDAO = new VeterinarioDAO($id, $nombre, $apellido, $correo, $clave, $especialidad);
    }
    
    
    function actualizar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> veterinarioDAO -> actualizar());
        $this -> conexion -> cerrar();
    }
    function registrar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> veterinarioDAO -> registrar());
        $this -> conexion -> cerrar();
    }
    
    function autenticar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> veterinarioDAO -> autenticar());
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
        $this -> conexion -> ejecutar($this -> veterinarioDAO -> consultar());
        $resultado = $this -> conexion -> extraer();
        $this -> nombre = $resultado[0];
        $this -> apellido = $resultado[1];
        $this -> correo = $resultado[2];
        $this -> especialidad = $resultado[3];
        $this -> disponible = $resultado[4];
        $this -> conexion -> cerrar();
    }
    
    function filtro($filtro){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> veterinarioDAO -> filtrar($filtro));
        $resultados = array();
        $i = 0;
        while (($registro = $this -> conexion -> extraer()) != null) {
            $resultados[$i] = new Veterinario($registro[0],$registro[1],$registro[2],$registro[3], "", $registro[4], $registro[5]);
            $i++;
        }
        $this -> conexion -> cerrar();
        return $resultados;
    }
    
    function existeCorreo(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> veterinarioDAO -> existeCorreo());
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
        $this -> conexion -> ejecutar($this -> veterinarioDAO -> consultarTodos());
        $resultados = array();
        $i = 0;
        while (($registro = $this -> conexion -> extraer()) != null) {
            $resultados[$i] = new Veterinario($registro[0],$registro[1],$registro[2],$registro[3], "", $registro[4], $registro[5]);
            $i++;
        }
        $this -> conexion -> cerrar();
        return $resultados;
    }
}