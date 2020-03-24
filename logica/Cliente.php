<?php
require 'persistencia/ClienteDAO.php';
require_once 'persistencia/Conexion.php';

class Cliente extends Persona{
    private $cedula;
    private $notificacion;
    private $clienteDAO;
    private $conexion;
    
    function getCedula(){
        return $this -> cedula;
    }
    
    function setNotificacion($notificacion){
        $this -> notificacion = $notificacion;
    }
    function getNotificacion(){
        return $this->notificacion;
    }
    
    function Cliente($id="", $nombre="", $apellido="", $correo="", $clave="", $cedula=""){
        $this -> Persona($id, $nombre, $apellido, $correo, $clave);
        $this -> cedula = $cedula;
        $this -> conexion = new Conexion();
        $this -> clienteDAO = new ClienteDAO($id, $nombre, $apellido, $correo, $clave, $cedula);
    }
    
    function registrar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> clienteDAO -> registrar());
        $this -> conexion -> cerrar();
    }
    
    function autenticar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> clienteDAO -> autenticar());
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
        $this -> conexion -> ejecutar($this -> clienteDAO -> consultar());
        $resultado = $this -> conexion -> extraer();
        $this -> nombre = $resultado[0];
        $this -> apellido = $resultado[1];
        $this -> correo = $resultado[2];
        $this -> cedula = $resultado[3];
        $this -> conexion -> cerrar();
    }
    function actualizar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> clienteDAO -> actualizar());
        $this -> conexion -> cerrar();
    }
    function filtro($filtro){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> clienteDAO -> filtrar($filtro));
        $resultados = array();
        $i = 0;
        while (($registro = $this -> conexion -> extraer()) != null) {
            $resultados[$i] = new Cliente($registro[0],$registro[1],$registro[2],$registro[3], "", $registro[4]);
            $i++;
        }
        $this -> conexion -> cerrar();
        return $resultados;
    }
    function existeCorreo(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> clienteDAO -> existeCorreo());
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
        $this -> conexion -> ejecutar($this -> clienteDAO -> consultarTodos());
        $resultados = array();
        $i = 0;
        while (($registro = $this -> conexion -> extraer()) != null) {
            $resultados[$i] = new Cliente($registro[0],$registro[1],$registro[2],$registro[3], "", $registro[4]);
            $i++;
        }
        $this -> conexion -> cerrar();
        return $resultados;
    }
}