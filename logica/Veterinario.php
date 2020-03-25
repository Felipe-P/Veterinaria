<?php
require 'persistencia/VeterinarioDAO.php';
require_once 'persistencia/Conexion.php';

class Veterinario extends Persona{
    private $especialidad;
    private $disponibilidad;
    private $veterinarioDAO;
    private $conexion;
    
    function getEspecialidad(){
        return $this -> especialidad;
    }
    
    function getDisponibilidad(){
        return $this -> disponibilidad;
    }
    
    function Veterinario($id="", $nombre="", $apellido="", $correo="", $clave="", $especialidad="", $disponibilidad=""){
        $this -> Persona($id, $nombre, $apellido, $correo, $clave);
        $this -> especialidad = $especialidad;
        $this -> disponibilidad = $disponibilidad;
        $this -> conexion = new Conexion();
        $this -> veterinarioDAO = new VeterinarioDAO($id, $nombre, $apellido, $correo, $clave, $especialidad, $disponibilidad);
    }
    function consultarCantidadVeterinario(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> veterinarioDAO -> consultarCantidadVeterinario());
        $resultado = $this -> conexion -> extraer();
        $this -> conexion -> cerrar();
        return $resultado[0];
    }
    function consultarCantidadVeterinarioGeneral(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> veterinarioDAO -> consultarCantidadVeterinarioGeneral());
        $resultado = $this -> conexion -> extraer();
        $this -> conexion -> cerrar();
        return $resultado[0];
    }
    function actualizar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> veterinarioDAO -> actualizar());
        $this -> conexion -> cerrar();
    }
    function actualizarDisponibilidad(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> veterinarioDAO -> actualizarDisponibilidad());
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
        $this -> disponibilidad = $resultado[4];
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
    function consultarDisponiblesTipo($Tipo){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> veterinarioDAO -> consultarDisponiblesTipo($Tipo));
        $resultados = array();
        $i = 0;
        while (($registro = $this -> conexion -> extraer()) != null) {
            $resultados[$i] = new Veterinario($registro[0],$registro[1],$registro[2],$registro[3], "", $registro[4], $registro[5]);
            $i++;
        }
        $this -> conexion -> cerrar();
        return $resultados;
    }
    function losMasTrabajadores(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> veterinarioDAO -> losMasTrabajadores());
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